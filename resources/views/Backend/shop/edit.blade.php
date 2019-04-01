@extends('backend.layouts.master')
@section('title','SHOP | EDIT')
@section('content')
<div class="container-fluid" id="shop-edit">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('backend.shop.shop-detail.update',$shop->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-7">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Shop Name:</h5>
                        <input type="text" name="name" value="{{$shop->name}}" class="form-control" placeholder="name">
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-warning">Shop Info:</div>
                    <div class="card-body">
                        <span>ADDRESS:</span>
                        <input type="text" name="address" value="{{$shop->address}}" class="form-control mb-3" placeholder="address">
                        <span>ENGLISH ADDRESS:</span>
                        <input type="text" name="address_en" value="{{$shop->address_en}}" class="form-control mb-3" placeholder="address english">
                        <span>TEL:</span>
                        <input type="text" name="tel" value="{{$shop->tel}}" class="form-control mb-3" placeholder="tel">
                        <span>營業時間:</span>
                        <input type="text" name="open_time" value="{{$shop->open_time}}" class="form-control mb-3" placeholder="open time">
                    </div>
                </div>       
            </div>
            <div class="col-md-5 mb-3 ">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        地圖資訊
                    </div>
                    <div class="card-body" id="mapurl">
                        <input type="text" name="url" value="{{$shop->url}}" class="form-control mb-3" placeholder="map url">
                        <iframe src="{{$shop->url}}" width=100% height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">更新</button>
                <a href="{{route('backend.shop.shop-detail.index')}}" class="btn btn-secondary">Back</a>
            </div>   
        </div>
    </form>

</div>
@endsection