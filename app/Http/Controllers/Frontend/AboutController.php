<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Share\ShopInfo;
use App\Models\Share\Calendar;
use App\Models\Share\Footer;
class AboutController extends Controller
{
    public function index(){
        
        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();
        $footer = Footer::find(1);

        return view('frontend.about',compact('shopinfo','calendars','footer'));

    }
}