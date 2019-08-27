<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop\Shop;
use App\Models\Share\ShopInfo;
use App\Models\Share\Calendar;
use App\Models\Share\Footer;
class ShopController extends Controller
{
    public function index(){
        
        $shops = Shop::all();
        $shopinfo = ShopInfo::all()->first();
        $calendars = Calendar::all();
        $footer = Footer::all()->first();

        return view('frontend.shop',compact('shops','shopinfo','calendars','footer'));

    }
}
