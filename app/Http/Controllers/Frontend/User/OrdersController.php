<?php

namespace App\Http\Controllers\Frontend\User;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use App\Models\Share\ShopInfo;
use App\Models\Share\Calendar;
use App\Models\Share\Footer;
use App\Models\Orders;

class OrdersController extends Controller
{
    public function index(){

        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();
        $footer = Footer::find(1);

        $user = Auth::user();
        $orders = Orders::where('user_id',$user->id)->get();

        return view('frontend.user.order',compact('orders','shopinfo','calendars','footer'));

    }
    public function getOrder($id){

        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();
        $footer = Footer::find(1);
        $isUser = false;

        $user = Auth::user();
        $orders = Orders::where('user_id',$user->id)->get();

        //determine whether order is user's order
        foreach ($orders as $order => $value) {
            if ($value->id == $id) {
                $isUser = true;
                $order = $value;
                break;
            }
        }
        
        //if is not user return
        if (!$isUser) {
            return view('frontend.user.order', compact('orders', 'shopinfo', 'calendars', 'footer'));
        }
        //transform string to json
        $order_product = json_decode($order->order_content,true);
        $products = array();

        //get product_detail form Product table
        foreach ($order_product as $product_id => $value) {
            $product = array('product'=>Product::find($product_id),'product_info' =>$value);
            $products[$product_id] = $product;
        }
        return view('frontend.user.order_detail', compact('order','products', 'shopinfo', 'calendars', 'footer'));
        
    }
}
