<?php

namespace App\Http\Controllers\Frontend\User;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}
