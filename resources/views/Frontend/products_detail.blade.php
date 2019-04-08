@extends('frontend.layouts.master') 
@section('title','PRODUCTS')
@section('content')
<div class="container" id="products_detail_content">
    <div class="row mt-5">
        <div class="col-md-6 p-5" id="products_detail_img">
            <img class="d-block w-100 rounded " src="{{asset('uploads/product/' . $product->image)}}" alt="product img">
        </div>
        <div class="col-md-6 p-5" id="products_detail_info">
            <h4>{{$product->name}}</h4>
            <hr>
            <p>{!! $product->description !!}</p>
            <p class="detail_price mb-lg-5">售價 <span>{{$product->price}}</span>元</p>
            <div class="row mb-md-2 mb-lg-5" id="quantity">
                <div class="col-2 col-md-3 col-lg-2 pr-0 align-self-center">
                    <label>數量</label>
                </div>
                <div class="col-5 pl-0">
                    <select class="form-control" name="quantity" id="quantity">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>
            <div class="row mb-md-2 mb-lg-5" id="product_button">
                <div class="col-6 add_to_cart">
                    <a href="#"><span>放入購物車 <i class="fas fa-shopping-basket align-middle"></i></span></a>
                </div>
            </div>
            <div class="back_button">
                <a href="{{route('products')}}"><span>回到PRODUCTS</span></a>
            </div>
        </div>
        
    </div>
</div>
@endsection