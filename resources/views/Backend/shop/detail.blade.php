@extends('backend.layouts.master')
@section('title','SHOP | DETAIL')
@section('content')
<div class="container-fluid" id="shop-detail">
    <div class="row tb-2">
        <div class="col-md-7">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Shop Name:</h5>
                    <p>{{$shop->name}}</p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-warning">Shop Info:</div>
                <div class="card-body">
                    <h5>ADDRESS:</h5>
                    <p>{{$shop->address}}</p>
                    <h5>ENGLISH ADDRESS:</h5>
                    <p>{{$shop->address_en}}</p>
                    <h5>TEL:</h5>
                    <p>{{$shop->tel}}</p>
                    <h5><b>營業時間:</b></h5>
                    <p>{{$shop->open_time}}</p>
                </div>
            </div>       
        </div>
        <div class="col-md-5 mb-3 ">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    地圖資訊
                </div>
                <div class="card-body" id="mapurl">
                    <input type="text" name="url" class="form-control mb-3" placeholder="map url">
                    <iframe src="{{$shop->url}}" width=100% height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <a href="{{route('backend.shop.shop-detail.index')}}" class="btn btn-secondary">Back</a>
        </div>   
    </div>



</div>
@endsection