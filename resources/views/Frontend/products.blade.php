@extends('frontend.layouts.master') 
@section('title','PRODUCTS')
@section('content')
<div class="container-fluid product_page_des">
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


@endsection