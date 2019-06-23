<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Earnings;
class DashBoardController extends Controller
{
    public function index(){
        $ordersCount = Orders::all()->count();
        $year = date('Y');
        $month = date('m');
        //get annual earnings and month earings  
        $Earning_Annual = Earnings::where('year',$year)->get();
        $EarningsofAnnual = 0;
        //calcute annual earnings
        for($i = 0 ; $i < $Earning_Annual->count(); $i++){
            $EarningsofAnnual += $Earning_Annual[$i]->earnings;
        }
        $Earning = Earnings::where('year',$year)->where('month',$month)->get();

        return view('backend.index',compact('ordersCount','Earning','EarningsofAnnual'));
    }
}
