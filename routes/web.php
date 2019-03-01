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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
