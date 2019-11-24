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
    
    return view('welcome');
});

Route::get('index', [
    'as'=>'trang-chu',
    'uses'=>'PageController@getIndex'
]);

Route::get('product-type/{type?}',[
    'as'=>'loai_sp',
    'uses'=>'PageController@getProductType'
]);

Route::get('product/{id}',[
    'as'=>'sanpham',
    'uses'=>'PageController@getProduct'
]);

Route::get('add-to-cart/{id}',[
    'as'=>'addcart',
    'uses'=>'PageController@getAddToCart'
]);


