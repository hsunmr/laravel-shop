<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Carousel;
use App\Models\Home\AboutDiv;
use App\Models\Share\ShopInfo;
use App\Models\Share\Calendar;
use App\Models\Share\Footer;
use App\Models\News\News;
class HomeController extends Controller
{
    public function index(){
        
        $carousels = Carousel::all();
        $aboutdivs = AboutDiv::all();
        $newss = News::orderby('created_at','desc')->take(5)->get();
        $shopinfo = ShopInfo::all()->first();
        $calendars = Calendar::all();
        $footer = Footer::all()->first();
        
        return view('frontend.index',compact('carousels','aboutdivs','newss','shopinfo','calendars','footer'));

    }
}
