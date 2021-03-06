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
        $shopinfo = ShopInfo::all()->first();
        $calendars = Calendar::all();
        $footer = Footer::all()->first();

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
        $shopinfo = ShopInfo::all()->first();
        $calendars = Calendar::all();
        $footer = Footer::all()->first();

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

}

