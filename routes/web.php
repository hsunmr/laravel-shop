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
Route::get('/news/detail/{news}', 'Frontend\NewsController@show')->name('news.detail');
Route::get('/products', 'Frontend\ProductsController@index')->name('products');
Route::get('/products/detail/{product}', 'Frontend\ProductsController@show')->name('products.detail');
Route::get('/shop','Frontend\ShopController@index')->name('shop');

//cart route
Route::get('/add-to-cart/{id}', 'Frontend\CartController@getAddToCart')->name('product.addToCart');
Route::get('/cart', 'Frontend\CartController@index')->name('cart');
Route::patch('/cart/{id}', 'Frontend\CartController@updateCart')->name('cart.update');
Route::delete('/cart/{id}', 'Frontend\CartController@deleteCart')->name('cart.delete');

//order and payment route
Route::middleware(['auth'])->group(function(){
    Route::get('/order','Frontend\OrderController@index')->name('cart.order');
    Route::post('/order','Frontend\OrderController@order_confirm')->name('cart.order.confirm');
    
    Route::get('/payment','Frontend\PaymentController@index')->name('cart.payment');
    Route::post('/checkout','Frontend\PaymentController@checkout')->name('cart.checkout');

    Route::get('/orders','Frontend\User\OrdersController@index')->name('orders');
    Route::get('/order_detail/{id}','Frontend\User\OrdersController@getOrder')->name('order.detail');

    Route::get('/profile', 'Frontend\User\ProfileController@index')->name('profile');
    Route::post('/profile', 'Frontend\User\ProfileController@update')->name('profile.update');
});



Route::middleware(['auth','admin'])->group(function(){
    Route::get('/dashboard', function () {
        return view('backend.index');
    })->name('dashboard');

    
    Route::prefix('backend')->group(function () {
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
            Route::resource('/historydiv', 'Backend\About\HistoryDivController');
        });
    
        Route::group(['as' => 'backend.news.'], function() {
            Route::resource('/newsdiv', 'Backend\News\NewsController');
        });
    
        Route::group(['as' => 'backend.products.'], function() {
            Route::resource('/menu', 'Backend\Products\MenuController');
            Route::resource('/product', 'Backend\Products\ProductController');
            Route::resource('/product-type', 'Backend\Products\ProductTypeController');
        });
    
        Route::group(['as' => 'backend.shop.'], function() {
            Route::resource('/shop-detail', 'Backend\Shop\ShopController');
        });

        Route::group(['as' => 'backend.user.'], function() {
            Route::resource('/orders', 'Backend\User\OrdersController');
        });
    });
    



});

Auth::routes();

