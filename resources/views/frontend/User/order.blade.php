@extends('frontend.layouts.master') 
@section('title','ORDER')
@section('content')
<div class="container-fluid orders_page_des">
    <div class="container orders_page_title">
        <h2 class="page_title">Orders</h2>
    </div>
            
    <div class='container' id="orders_content">
        @if ($orders->isEmpty())
        <div class="text-center">
            no orders information
        </div>
           
        @else       
            @foreach ($orders as $order)
            <div class="order_item mb-3">
                <p>訂貨日期 {{$order->created_at->format('Y年m月d日')}}</p>
                <p>訂單編號 {{$order->id}}</p>
                <p>訂單狀態 <font style="color:red">
                @switch($order->status)
                    @case(0)
                        處理中</font></p>
                        @break
                    @case(1)
                        運送中</font></p>
                        @break
                    @case(2)
                        已完成</font></p>
                        @break
                    @default
                        錯誤</font></p>
                @endswitch
                
                <div class="text-right mb-2">
                    <a href="{{route('order.detail',$order->id)}}" class='linkbutton' id="orders_button">詳細資料</a>
                </div>
            
            </div>
            @endforeach
        @endif
    </div>  
</div>
@endsection