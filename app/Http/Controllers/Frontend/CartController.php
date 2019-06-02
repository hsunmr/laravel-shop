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

class CartController extends Controller
{
    public function index(Request $request)
    {
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

        return view('frontend.cart.index', compact('products', 'totalPrice', 'shopinfo', 'calendars', 'footer'));
    }
    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();
        $footer = Footer::find(1);

        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        
        return view('frontend.products.products_detail', compact('product', 'shopinfo', 'calendars', 'footer'));
    }
    public function updateCart(Request $request, $id)
    {
        $product = Product::find($id);

        $oldCart = $request->session()->get('cart') ;

        $cart = new Cart($oldCart);
        $cart->update($id, $request->quantity, $product);

        $request->session()->put('cart', $cart);

        return response()->json(['success'=>true]);
    }
    public function deleteCart(Request $request, $id)
    {
        $oldCart = $request->session()->get('cart');

        $cart = new Cart($oldCart);
        $cart->delete($id);
        if ($cart->items == null) {
            $request->session()->forget('cart');
        } else {
            $request->session()->put('cart', $cart);
        }

        return response()->json(['success'=>true]);
    }

    // order page 
    public function order(Request $request){
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
    // payment page 
    public function payment(Request $request){
        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();
        $footer = Footer::find(1);
        
        if (!Session::has('cart')) {
            return view('frontend.cart.index', compact(['products' => null ], 'shopinfo', 'calendars', 'footer'));
        }else if(!Session::has('customer')){
            $oldCart = $request->session()->get('cart');
            $cart = new Cart($oldCart);
            $products =  $cart->items;
            $totalPrice = $cart->totalPrice;
            return view('frontend.cart.index', compact('products', 'totalPrice', 'shopinfo', 'calendars', 'footer'));
        }
        return view('frontend.cart.payment', compact('shopinfo', 'calendars', 'footer'));
    }
}

