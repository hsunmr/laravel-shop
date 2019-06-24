<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Earnings;
use App\Models\ProductsSales;
class DashBoardController extends Controller
{
    public function index(){
        $ordersCount = Orders::all()->count();
        $year = date('Y');
        $month = date('n');
        $english_month = array('January','February','March','April','May','June',
            'July','August','September','October','November','December',
        );
        //get monthly earnings
        $Earning = Earnings::where('year',$year)->where('month',$month)->get();
        //get annual earnings and month earnings  
        $Earning_Annual = Earnings::where('year',$year)->get();
        $Earning_Annual_last = Earnings::where('year',$year-1)->get();
        $EarningsofAnnual = 0;
        //calcute annual earnings
        for($i = 0 ; $i < $Earning_Annual->count(); $i++){
            $EarningsofAnnual += $Earning_Annual[$i]->earnings;
        }
        //calcute earnings chart data
        $count = 6;
        $earnings_labels = array();
        $earnings_data = array();
        $temp_month = $month-1;
        
        $earnings_of_current_year = $Earning_Annual;
        while($count != 0){
            if($temp_month == '-1'){
                $temp_month = 11;
                $earnings_of_current_year = $Earning_Annual_last;
            }
            array_unshift($earnings_labels,$english_month[$temp_month]);
            array_unshift($earnings_data,$earnings_of_current_year[$temp_month]->earnings);
            $temp_month--;
            $count--;
        }
        $line_data = array('labels'=>$earnings_labels,'data'=>$earnings_data);

        //transfer product sales table data 
        $product_sales = ProductsSales::all();
        $sales_labels = array();
        $sales_data = array();
        foreach ($product_sales as $id => $product) {
            array_unshift($sales_labels,$product['product_name']);
            array_unshift($sales_data,$product['sales_volume']);
        }
        $Pie_data = array('labels'=>$sales_labels,'data'=>$sales_data);

        return view('backend.index',compact('ordersCount','Earning','EarningsofAnnual','line_data','Pie_data'));
    }
}
