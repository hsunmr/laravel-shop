<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
})->name('home');
Route::get('/about', function () {
    return view('frontend.about');
})->name('about');
Route::get('/news', function () {
    return view('frontend.news');
})->name('news');
Route::get('/news-detail', function () {
    return view('frontend.news_detail');
})->name('news_detail');
Route::get('/products', function () {
    return view('frontend.products');
})->name('products');
Route::get('/shop', function () {
    return view('frontend.shop');
})->name('shop');
Route::get('/cart', function () {
    return view('frontend.cart');
})->name('cart');
Route::get('/order', function () {
    return view('frontend.user.order');
})->name('order');
Route::middleware(['auth','admin'])->group(function(){
    Route::get('/dashboard', function () {
        return view('backend.index');
    })->name('dashboard');

    
    
    Route::group(['as' => 'backend.home.'], function() {

        Route::resource('/carousel', 'Backend\Home\CarouselController');
        Route::resource('/aboutdiv', 'Backend\Home\AboutDivController');
    });

    Route::group(['as' => 'backend.share.'], function() {
        Route::get('/shopinfo', 'Backend\Share\ShopInfoController@index')->name('shopinfo.index');
        Route::put('/shopinfo', 'Backend\Share\ShopInfoController@update')->name('shopinfo.update');
        Route::get('/footer', 'Backend\Share\FooterController@index')->name('footer.index');
        Route::put('/footer', 'Backend\Share\FooterController@update')->name('footer.update');
    });


});

Auth::routes();

