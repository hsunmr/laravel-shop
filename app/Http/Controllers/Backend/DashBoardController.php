<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Orders;
use App\Models\Earnings;
use App\Models\ProductsSales;
class DashBoardController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin'); 
    }
    
    public function index(){
        $ordersCount = Orders::all()->count();
        $usersCount = User::all()->count();
        $year = date('Y');
        $month = date('n');
        $english_month = array('January','February','March','April','May','June',
            'July','August','September','October','November','December',
        );
        //get annual earnings and month earnings  
        $Earning_Annual = Earnings::where('year',$year)->get();
        if(empty($Earning_Annual[0]))
        {
            for($i = 0 ;$i <12 ;$i++){
                Earnings::create([
                    'year' => $year,
                    'month' => $i+1,
                    'earnings' => '0'
                ]);
            }
        }
        $Earning_Annual_last = Earnings::where('year',$year-1)->get();
        if(empty($Earning_Annual_last[0]))
        {
            for($i = 0 ;$i <12 ;$i++){
                Earnings::create([
                    'year' => $year-1,
                    'month' => $i+1,
                    'earnings' => '0'
                ]);
            }
        }
        $EarningsofAnnual = 0;
      
        //calcute annual earnings
        for($i = 0 ; $i < $Earning_Annual->count(); $i++){
            $EarningsofAnnual += $Earning_Annual[$i]->earnings;
        }
        $EarningsofAnnual = number_format($EarningsofAnnual);
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
        
        //get monthly earnings
        $Earning = Earnings::where('year',$year)->where('month',$month)->get();
        $EarningsofMonth= number_format($Earning[0]->earnings);
        
        //transfer product sales table data 
        $product_sales = ProductsSales::all();
        $sales_labels = array();
        $sales_data = array();
        foreach ($product_sales as $id => $product) {
            array_unshift($sales_labels,$product['product_name']);
            array_unshift($sales_data,$product['sales_volume']);
        }
        $Pie_data = array('labels'=>$sales_labels,'data'=>$sales_data);
        
        return view('backend.index',compact('usersCount','ordersCount','EarningsofMonth','EarningsofAnnual','line_data','Pie_data'));
    }
}
