@extends('backend.layouts.master')
@section('title','SHOP | CREATE')
@section('content')
<div class="container-fluid" id="shop-create">
    <div class="row">
        <div class="col content-title">
            <i class="fas fa-plus-circle fa-2x align-middle"></i>
            <span class="align-middle">New Shop</span>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('backend.shop.shop-detail.store')}}" method="post">
        @csrf
        <div class="row ">
            <div class="col-md-7">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Shop Name:</h5>
                        <input type="text" name="name" class="form-control" placeholder="name">
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-warning">Shop Info:</div>
                    <div class="card-body">
                        <span>ADDRESS:</span>
                        <input type="text" name="address" class="form-control mb-3" placeholder="address">
                        <span>ENGLISH ADDRESS:</span>
                        <input type="text" name="address_en" class="form-control mb-3" placeholder="address english">
                        <span>TEL:</span>
                        <input type="text" name="tel" class="form-control mb-3" placeholder="tel">
                        <span>營業時間:</span>
                        <input type="text" name="open_time" class="form-control mb-3" placeholder="open time">
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
                       <iframe src="" width=0 height="0" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">上傳</button>
                <a href="{{route('backend.shop.shop-detail.index')}}" class="btn btn-secondary">Back</a>

            </div>   
        </div>

    </form>

</div>
@endsection