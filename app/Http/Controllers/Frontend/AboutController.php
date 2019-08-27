<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About\IntroDiv;
use App\Models\About\HistoryDiv;
use App\Models\Share\ShopInfo;
use App\Models\Share\Calendar;
use App\Models\Share\Footer;
class AboutController extends Controller
{
    public function index(){
        
        $introdivs = IntroDiv::all();
        $historys = HistoryDiv::all();
        $shopinfo = ShopInfo::all()->first();
        $calendars = Calendar::all();
        $footer = Footer::all()->first();

        return view('frontend.about',compact('introdivs','historys','shopinfo','calendars','footer'));

    }

    
}
