@extends('frontend.layouts.master') 
@section('title','PRODUCTS')
@section('content')
<div class="container-fluid product_page_des">
    @foreach ($categorys as $category)
        <div class="'container product_page_{{strtolower($category[0]->type)}}" >
            <h2 class="page_title">{{$category[0]->type}}</h2>      {{--product or menu--}}
            @foreach ($types as $type)                             
                @if ($type->type == $category[0]->type)
                    <div class="container menu_box">
                        <h2 class="menu_title">{{$type->name}}</h2>
                        <div class="row menu_row">    
                            @foreach ($products as $product)
                                @if ($product->type == $type->name) {{--type of product--}} 
                                    <div class="col-lg-4 col-sm-6 menu_col">
                                        <img class="d-block w-100 rounded"src="{{asset('uploads/' . $type->type . '/' . $product->image)}}">
                                        <div class="box_title">{{$product->name}}</div>
                                       @if ($type->type == 'Product')
                                            <a href="#"><span>購買 <i class="far fa-arrow-alt-circle-right align-middle"></i></span></a>
                                       @endif                                    
                                    </div>  
                                @endif                      
                            @endforeach
                        </div>
                    </div>
                @endif
                
            @endforeach

        </div>
    @endforeach

</div>


@endsection