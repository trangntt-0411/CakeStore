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

Route::post('index', [
    'as'=>'home-page',
    'uses'=>'PageController@postIndex'
]);

Route::get('product-type/{type}',[
    'as'=>'product-type',
    'uses'=>'PageController@getProductType'
]);

Route::get('product/{id}',[
    'as'=>'product',
    'uses'=>'PageController@getProduct'
]);


Route::get('register',[
    'as'=>'register',
    'uses'=>'PageController@getRegister'
]);

Route::post('register',[
    'as'=>'register',
    'uses'=>'PageController@postRegister'
]);

Route::get('login', [
    'as'=>'login',
    'uses'=>'PageController@getLogin'
]);

Route::post('login',[
    'as'=>'login',
    'uses'=>'PageController@postLogin'
]);

Route::get('logout',[
    'as'=>'logout',
    'uses'=>'PageController@getLogout'
]);

Route::get('add-cart/{id}',[
    'as'=>'addcart',
    'uses'=>'PageController@getAddCart'
]);

Route::get('remove-item/{id}',[
    'as'=>'removecart',
    'uses'=>'PageController@getRemoveCart'
]);


Route::get('search', [
    'as'=>'search',
    'uses'=>'PageController@getSearch'
]);

Route::get('checkout', [
    'as'=>'checkout',
    'uses'=>'PageController@getCheckout'
]);

Route::post('checkout', [
    'as'=>'checkout',
    'uses'=>'PageController@postCheckout'
]);




