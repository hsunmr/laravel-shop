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
            {!! $product->description !!}
            <p class="detail_price">售價 <span>{{$product->price}}</span>元</p>

            <div class="row pb-5" id="product_button">
                <div class="col-6 add_to_cart">
                    <a href="{{route('product.addToCart',$product->id)}}"><span>放入購物車 <i class="fas fa-shopping-basket align-middle"></i></span></a>
                </div>
            </div>
        </div>
        <div class="back_button w-100 pl-5 pr-5">
            <a href="{{route('products')}}"><span>回到PRODUCTS</span></a>
        </div>
    </div>
</div>
@endsection