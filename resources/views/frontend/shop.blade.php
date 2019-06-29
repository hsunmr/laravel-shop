@extends('frontend.layouts.master') 
@section('title','SHOP')
@section('content')
<div class="container-fluid shop_page_des">
    <div class="container shop_page_content">
        <h2 class="page_title">SHOP</h2>
        @foreach ($shops as $shop)
            <div class="shop_box">
                <span class="shop_title">HSUN COFFEE {{$shop->name}}</span>
                <div class="row">
                    <div class="col-md-6 shop_map">
                        <iframe src="{{$shop->url}}" width=90% height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-6 shop_text">
                        <span class="info_title">INFO</span><br>
                        <span>{{$shop->address}}</span><br>
                        <span>{{$shop->address_en}}</span><br>
                        <span>TEL: {{$shop->tel}}</span><br>
                        <span>營業時間: {{$shop->open_time}}</span><br>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection