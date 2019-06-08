@extends('frontend.layouts.master') 
@section('title','ORDER')
@section('content')
<div class="container-fluid orders_page_des">
    <div class="container cart_page_content">
        <h2 class="page_title">Orders</h2>
    </div>
            
    <div class='container' id="orders_content">

        @foreach ($orders as $order)
        <div class="order_item mb-3">
            <p>訂貨日期 {{$order->created_at->format('Y年m月d日')}}</p>
            <p>訂單編號 {{$order->id}}</p>
            @switch($order->status)
                @case(0)
                    <p>訂單狀態 處理中</p>
                    @break
                @case(1)
                    <p>訂單狀態 運送中</p>
                    @break
                @case(2)
                    <p>訂單狀態 已完成</p>
                    @break
                @default
                    <p>訂單狀態 錯誤</p>
            @endswitch
            <div class="text-right mb-2">
                <a href="#" class='linkbutton' id="orders_button">詳細資料</a>
            </div>
            
        </div>
        
            
        @endforeach
    </div>  
</div>
@endsection