<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Carousel;
use App\models\Home\AboutDiv;
use App\Models\Share\ShopInfo;
use App\Models\Share\Calendar;
use App\Models\Share\Footer;
class HomeController extends Controller
{
    public function index(){
        
        $carousels = Carousel::all();
        $aboutdivs = AboutDiv::all();
        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();
        $footer = Footer::find(1);

        return view('frontend.index',compact('carousels','aboutdivs','shopinfo','calendars','footer'));

    }
}
