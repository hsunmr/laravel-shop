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

Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('/about', 'Frontend\AboutController@index')->name('about');
Route::get('/news', 'Frontend\NewsController@index')->name('news');
Route::get('/news-detail', 'Frontend\AboutController@index')->name('news_detail');
Route::get('/products', 'Frontend\ProductsController@index')->name('products');
Route::get('/shop','Frontend\ShopController@index')->name('shop');
Route::get('/cart', 'Frontend\CartController@index')->name('cart');
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

    Route::group(['as' => 'backend.about.'], function() {
        Route::resource('/introdiv', 'Backend\About\IntroDivController');
        Route::resource('/history', 'Backend\About\HistoryDivController');
    });


});

Auth::routes();

