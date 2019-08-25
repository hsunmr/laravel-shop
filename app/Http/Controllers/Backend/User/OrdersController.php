<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Earnings;
use App\Models\ProductsSales;
use App\Models\Products\Product;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::orderby('created_at','desc')->paginate(6);
        return view('backend.user.orders',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $order = Orders::find($id);

        //transform string to json
        $order_product = json_decode($order->order_content,true);
        $products = array();

        //get product_detail form Product table
        foreach ($order_product as $product_id => $value) {
            $product = array('product'=>Product::find($product_id),'product_info' =>$value);
            $products[$product_id] = $product;
        }
        return view('backend.user.order_detail', compact('order','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Orders::find($id);
        $order->status = $request->input('status');
        $order_product = json_decode($order->order_content,true);
        $order->save();

        if($order->status == '2'){
            $year = date('Y');
            $month = date('n');
            $earning = Earnings::where('year',$year)->where('month',$month)->get();
            //calcute earnings and save to table
            $earning[0]->earnings = $earning[0]->earnings + $order->totalPrice;
            $earning[0]->save();
            
            
            //set order_products to products_sales table
            foreach ($order_product as $product_id => $value) {
                $product_sales = ProductsSales::where('product_name',$value['product_name'])->get();
                if($product_sales->isEmpty()){
                    ProductsSales::create([
                        'product_name' => $value['product_name'],
                        'sales_volume' => $value['qty'],
                    ]);
                }else{
                    $product_sales[0]->sales_volume += $value['qty'];
                    $product_sales[0]->save();
                }
            }
        }

        return redirect()->route('backend.user.orders.index')
                         ->with('success', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
