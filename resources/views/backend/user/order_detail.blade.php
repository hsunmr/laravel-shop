@extends('backend.layouts.master')
@section('title','ORDERS|DETAIL')
@section('content')
<div class="container-fluid order_detail">
            
    <div class="order_detail mt-5">
        <div class="card order_customer_info mb-5">
            <div class="card-header">
                訂購資訊
            </div>
            <div class="card-body">
                <div class="row mb-0">
                    <div class="col-md-2 col-4">訂貨日期</div><div class="col-md-10 col-8">{{$order->created_at->format('Y年m月d日')}}</div>
                    <div class="col-md-2 col-4">訂單編號</div><div class="col-md-10 col-8">{{$order->id}}</div>
                    <div class="col-md-2 col-4">訂單狀態</div><div class="col-md-10 col-8"><font style="color:red">
                        @switch($order->status)
                            @case(0)
                                處理中</font>
                                @break
                            @case(1)
                                運送中</font>
                                @break
                            @case(2)
                                已完成</font>
                                @break
                            @default
                                錯誤</font>
                        @endswitch
                    </div>
                    <hr class='w-100'>
                    <div class="col-md-2 col-4">姓名</div><div class="col-md-10 col-8">{{$order->order_name}}</div>
                    <div class="col-md-2 col-4">郵遞區號</div><div class="col-md-10 col-8">{{$order->zip_cd}}</div>
                    <div class="col-md-2 col-4">地址</div><div class="col-md-10 col-8">{{$order->address}}</div>
                    <div class="col-md-2 col-4">電話</div><div class="col-md-10 col-8">{{$order->tel}}</div>
                    <div class="col-md-2 col-4">信箱</div><div class="col-md-10 col-8">{{$order->email}}</div>
                </div>
            </div>
        </div>
        <div class="card order_products mb-5">
            <div class="card-header">
                訂購商品
            </div>
            <div class="card-body">
                <table class="table" id="cart_table">
                    <thead>
                        <tr>
                            <th class="productname">商品圖片</th>
                            <th class="unitprice">單價</th>
                            <th class="quantity">數量</th>
                            <th class="price">金額</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="product_info">
                                <div class="product_img d-inline-block">
                                    <a href="{{route('products.detail',$product['product']['id'])}}">
                                        <img src="{{asset('uploads/product/' . $product['product']['image'] )}}">
                                    </a>
                                </div>
                                <div class="product_text d-none d-md-inline-block pl-5">
                                    <div class="product_name">
                                        {{ $product['product']['name'] }}
                                    </div>
                                    <hr>
                                    <div class="product_description">
                                        {!! $product['product']['description'] !!}
                                    </div>
                                    
                                </div>
                            </td>
                            
                            <td class="product_price"> {{ $product['product']['price'] }}</td>
                            <td class="product_quantity">{{$product['product_info']['qty']}}</td>
                            <td class="product_totalprice">{{ $product['product_info']['price'] }}</td>
                        </tr>			
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="total">
                                <p class="total_price">商品合計 <strong class="priceval">{{ $order->totalPrice }}</strong></p>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <a href="{{route('backend.user.orders.index')}}" class="btn btn-secondary">Back</a>
        </div>  
    </div>
</div>
@endsection