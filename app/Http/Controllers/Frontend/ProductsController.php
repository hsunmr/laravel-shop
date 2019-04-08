<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use App\Models\Products\Menu;
use App\Models\Products\ProductType;
use App\Models\Share\ShopInfo;
use App\Models\Share\Calendar;
use App\Models\Share\Footer;
class ProductsController extends Controller
{
    public function index(){
        
    
        $products = Product::all();
        $menus = Menu::all();

        foreach ($menus as $menu) {
            $products->add($menu);
        }

        $categorys = ProductType::orderBy('type','desc')->get()->groupBy('type');
        $types = ProductType::orderby('order')->get();
        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();
        $footer = Footer::find(1);

        return view('frontend.products',compact('categorys','products','types','shopinfo','calendars','footer'));

    }
    public function show($id)
    {
        $product = Product::find($id);
        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();
        $footer = Footer::find(1);
        return view('frontend.products_detail',compact('product','shopinfo','calendars','footer'));
    }
}
