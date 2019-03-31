@extends('backend.layouts.master')
@section('title','PRODUCT | DETAIL')
@section('content')
<div class="container-fluid" id="product-detail">
    <div class="row">
        <div class="col-md-8 ">
            <div class="card mb-3">
                <div class="card-header bg-warning">Product Info:</div>
                <div class="card-body">
                    <h5>Name:</h5>
                    <p>{{$product->name}}</p>
                    <h5 >Type:</h5>
                    <p>{{$product->type}}</p>
                    <h5 >Price:</h5>
                    <p>{{$product->price}}</p>
                </div>
            </div>      
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Product description</h5>
                    <textarea name="description" id="description" disabled>{{$product->description}}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3 ">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    文章圖片
                </div>
                <div class="card-body">
                    <img class="preview border" src="{{ asset('uploads/product/' . $product->image) }}">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <a href="{{route('backend.products.product.index')}}" class="btn btn-secondary">Back</a>
        </div>   
    </div>



</div>
@endsection