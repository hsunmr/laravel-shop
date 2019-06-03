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
use Session;

class PaymentController extends Controller
{
    // payment page 
    public function index(Request $request){
        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();
        $footer = Footer::find(1);

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
            //code...
        } catch (Exception $e) {
            //throw $th;
        }
    }
}

