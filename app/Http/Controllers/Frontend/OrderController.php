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

class OrderController extends Controller
{

    // order page 
    public function index(Request $request){
        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();
        $footer = Footer::find(1);

        if (!Session::has('cart')) {
            return view('frontend.cart.index', compact(['products' => null ], 'shopinfo', 'calendars', 'footer'));
        }
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        $products =  $cart->items;
        $totalPrice = $cart->totalPrice;
        if (Session::has('customer')) {
            $request->session()->forget('customer');
        }
        return view('frontend.cart.order', compact('products', 'totalPrice','shopinfo', 'calendars', 'footer'));
    }
    // order page post
    public function order_confirm(Request $request, $id){

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'name' => ['required','alpha', 'string', 'max:255'],
            'zip_cd' => ['required', 'numeric','digits_between:3,5'],
            'address' => ['required', 'alpha_dash','string', 'max:255'],
            'tel' => ['required', 'numeric', 'digits_between:6,11'],
        ]);
        $user = User::find($id);

        $customer = [
            'user'=> $user,
            'email' =>$request->input('email'),
            'name' =>$request->input('name'),
            'zip_cd' =>$request->input('zip_cd'),
            'address' =>$request->input('address'),
            'tel' =>$request->input('tel')
        ];

        $request->session()->put('customer', $customer);
        
        return redirect()->route('cart.payment');
        
    }
}

