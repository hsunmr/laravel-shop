@extends('frontend.layouts.master') 
@section('title','PRODUCTS')
@section('content')
<div class="container-fluid product_page_des">
    <div class="container product_page_product">
        <h2 class="page_title">Product</h2>
        <div class="container menu_box">
            <h2 class="menu_title">Beans</h2>
            <div class="row menu_row" > 
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100 rounded"src="../img/menu/beans_single.jpg">
                    <div class="box_title ">Single Origin Set</div>
                    <a href="#"><span>購買  <i class="fas fa-chevron-circle-right align-middle"></i></span> </a>

                </div>
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/beans_ori.jpg">
                    <div class="box_title">Original Blend Set</div>
                    <a href="#"><span>購買</span></a>
                </div> 
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/beans_sarutahiko.jpg">
                    <div class="box_title">SARUTAHIKO MILD</div>
                    <a href="#"><span>購買</span></a>
                </div> 
            </div>
        </div>
        <div class="container menu_box">
            <h2 class="menu_title">Tools & Equipment</h2>
            <div class="row menu_row" >
                
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100"src="../img/menu/stagg_pour_over.png">
                    <div class="box_title">Stagg Pour-over Kettle</div>
                    <a href="#"><span>購買</span></a>
                </div>
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/drippen.jpg">
                    <div class="box_title">Drippen</div>
                    <a href="#"><span>購買</span></a>
                </div> 
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/coffee_bottle.jpg">
                    <div class="box_title">Coffee Canister</div>
                    <a href="#"><span>購買</span></a>
                </div> 
            </div>
        </div>
    </div>
    <div class="container  product_page_menu">
        <h2 class="page_title">MENU</h2>
        
            @foreach ($types as $type)
            <div class="container menu_box">
                <h2 class="menu_title">{{$type->name}}</h2>
                <div class="row menu_row">
                    @foreach ($menus as $menu)
                        @if ($menu->type == $type->name)
                            <div class="col-lg-4 col-sm-6 menu_col">
                                <img class="d-block w-100"src="{{asset('uploads/menu/' . $menu->image)}}">
                                <div class="box_title">{{$menu->name}}</div>
                            </div>  
                        @endif                      
                    @endforeach
                </div>
            </div>
            @endforeach
            
    </div>

</div>


@endsection