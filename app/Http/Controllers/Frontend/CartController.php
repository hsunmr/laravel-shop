<?php

namespace App\Http\Controllers\Frontend;

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
    public function index(Request $request){
        
        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();
        $footer = Footer::find(1);

        if(!Session::has('cart'))
            return view('frontend.cart',compact(['products' => null ],'shopinfo','calendars','footer'));
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        $products =  $cart->items;
        $totalPrice = $cart->totalPrice;

        return view('frontend.cart',compact('products','totalPrice','shopinfo','calendars','footer'));
        
    }
    public function getAddToCart(Request $request,$id){
        $product = Product::find($id);
        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();
        $footer = Footer::find(1);

        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);
        $request->session()->put('cart', $cart);
        
        return view('frontend.products_detail',compact('product','shopinfo','calendars','footer'));

    }
    public function updateCart(Request $request,$id){
        $product = Product::find($id);

        $oldCart = $request->session()->get('cart') ;

        $cart = new Cart($oldCart);
        $cart->update($id,$request->quantity,$product);

        $request->session()->put('cart', $cart);

        return response()->json(['success'=>true]);
    }
    public function deleteCart(Request $request,$id){

        $oldCart = $request->session()->get('cart');

        $cart = new Cart($oldCart);
        $cart->delete($id);
        
        $request->session()->put('cart', $cart);

        return response()->json(['success'=>true]);
    }
}
