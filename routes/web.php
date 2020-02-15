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
    'as'=>'home-page',
    'uses'=>'PageController@getIndex'
]);

Route::get('product-type/{type}',[
    'as'=>'product-type',
    'uses'=>'PageController@getProductType'
]);

Route::get('product/{id}',[
    'as'=>'product',
    'uses'=>'PageController@getProduct'
]);