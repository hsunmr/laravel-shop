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
        <div class="container menu_box">
            <h2 class="menu_title">Pour Over</h2>
            <div class="row menu_row" >
                
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100"src="../img/menu/ori_blend.jpg">
                    <div class="box_title">Original Blend</div>
                </div>
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/single_ori.jpg">
                    <div class="box_title">Single Origin</div>
                </div> 
            </div>
        </div>
        <div class="container menu_box">
            <h2 class="menu_title">Espresso</h2>
            <div class="row menu_row" >
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100"src="../img/menu/latte.jpg">
                    <div class="box_title">Cafe latte</div>
                </div>
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/cappuccino.jpg">
                    <div class="box_title">Cappuccino</div>
                </div> 
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/americano.jpg"> 
                    <div class="box_title">Americano</div>
                </div>
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/espresso.jpg"> 
                    <div class="box_title">Espresso</div>
                </div>
            </div>
        </div>
        <div class="container menu_box">
            <h2 class="menu_title">Arrangement Drink</h2>
            <div class="row menu_row">
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100"src="../img/menu/cafe_mocha.jpg">
                    <div class="box_title">Cafe mocha</div>
                </div>
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/honey_latte.jpg">
                    <div class="box_title">Honey latte</div>
                </div> 
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/caramel_latte.jpg"> 
                    <div class="box_title">Carmamel latte</div>
                </div>
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/cocoa.jpg"> 
                    <div class="box_title">Cocoa</div>
                </div>
            </div>
        </div>
        <div class="container menu_box">
            <h2 class="menu_title">Food</h2>
            <div class="row menu_row">
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100"src="../img/menu/Pancake.jpg">
                    <div class="box_title">Pancake</div>
                </div>
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/s_pancake.jpg">
                    <div class="box_title">Special Pancake</div>
                </div> 
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/cake.jpg"> 
                    <div class="box_title">Cakes by Toshi Yoroizuka</div>
                </div>
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/bread.jpg"> 
                    <div class="box_title">Bread</div>
                </div>
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/ice_cream.jpg"> 
                    <div class="box_title">Ice Cream</div>
                </div>
                <div class="col-lg-4 col-sm-6 menu_col">
                    <img class="d-block w-100" src="../img/menu/affogato.jpg"> 
                    <div class="box_title">Affogato</div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection