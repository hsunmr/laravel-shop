@extends('backend.layouts.master')
@section('title','MENU | DETAIL')
@section('content')
<div class="container-fluid" id="menu-detail">
    <div class="row">
        <div class="col-md-8 ">
            <div class="card mb-3">
                <div class="card-header bg-warning">Product Info:</div>
                <div class="card-body">
                    <h5>Name:</h5>
                    <p>{{$menu->name}}</p>
                    <h5 >Type:</h5>
                    <p>{{$menu->type}}</p>
                    <h5 >Price:</h5>
                    <p>{{$menu->price}}</p>
                </div>
            </div>      
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Product description</h5>
                    <textarea name="description" id="description" disabled>{{$menu->description}}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3 ">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    文章圖片
                </div>
                <div class="card-body">
                    <img class="preview border" src="{{ asset('uploads/menu/' . $menu->image) }}">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <a href="{{route('backend.products.menu.index')}}" class="btn btn-secondary">Back</a>
        </div>   
    </div>



</div>
@endsection