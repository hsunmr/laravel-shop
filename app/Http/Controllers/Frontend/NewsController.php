<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Share\ShopInfo;
use App\Models\Share\Calendar;
use App\Models\Share\Footer;
use App\Models\News\News;
class NewsController extends Controller
{
    public function index(){
        
        $newss = News::orderby('created_at','desc')->paginate(10);
        $shopinfo = ShopInfo::all()->first();
        $calendars = Calendar::all();
        $footer = Footer::all()->first();

        return view('frontend.news',compact('newss','shopinfo','calendars','footer'));

    }
    public function show($id)
    {
        $news = News::find($id);
        $shopinfo = ShopInfo::all()->first();
        $calendars = Calendar::all();
        $footer = Footer::all()->first();
        return view('frontend.news_detail',compact('news','shopinfo','calendars','footer'));
    }

}
