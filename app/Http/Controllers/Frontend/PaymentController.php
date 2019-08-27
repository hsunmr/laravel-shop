<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use App\Models\Share\ShopInfo;
use App\Models\Share\Calendar;
use App\Models\Share\Footer;
use App\Models\Products\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use App\Models\Orders;
use Session;

class PaymentController extends Controller
{
    // payment page 
    public function index(Request $request){
        $shopinfo = ShopInfo::all()->first();
        $calendars = Calendar::all();
        $footer = Footer::all()->first();

        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        $products =  $cart->items;
        $totalPrice = $cart->totalPrice;

        if (!Session::has('cart')) {
            return view('frontend.cart.index', compact(['products' => null ], 'shopinfo', 'calendars', 'footer'));
        }else if(!Session::has('customer')){
            return view('frontend.cart.index', compact('products', 'totalPrice', 'shopinfo', 'calendars', 'footer'));
        }
        return view('frontend.cart.payment', compact('products', 'totalPrice','shopinfo', 'calendars', 'footer'));
    }
    public function checkout(Request $request){

        try {
            //get cart session
            $oldCart = $request->session()->get('cart');
            $cart = new Cart($oldCart);
            $products =  $cart->items;
            $totalPrice = $cart->totalPrice;
            
            //transform products item
            $content = array();
            foreach ($products  as $product => $value) {
                $item = array('product_name' => $value['item']['name'],'qty' => $value['qty'],'price' => $value['price']);
                $content[$product] = $item;
            }
            $content = json_encode($content);
            $customer_info =  $request->session()->get('customer');
            
            //charge 
            $charge = Stripe::charges()->create([
                'amount' => $totalPrice,
                'currency' => 'TWD',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $customer_info['email'],
                'metadata' => [
                    //change to Order ID after we start using DB
                    'contents' => $content,
                    'quantity' =>  $cart->totalQty,
                ]
            ]);
            //add to orders table (database)
            Orders::create([
                'user_id' => $customer_info['user']['id'],
                'email'=> $customer_info['email'],
                'order_name' => $customer_info['name'],
                'zip_cd' => $customer_info['zip_cd'],
                'address' => $customer_info['address'],
                'tel' => $customer_info['tel'],
                'order_content' => $content,
                'totalPrice' => $totalPrice,
                'status' => '0'
            ]);      
            //refresh session  
            $request->session()->forget('cart');
            $request->session()->forget('customer');

            return redirect()->route('cart')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
        
        } catch (CardErrorException $e) {
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }
}

