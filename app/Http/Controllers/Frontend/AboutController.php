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
        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();
        $footer = Footer::find(1);

        return view('frontend.about',compact('introdivs','historys','shopinfo','calendars','footer'));

    }
}
