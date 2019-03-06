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

Route::get('/',[
  'as'=>'trang-chu',
  'uses'=>'PageController@getIndex'
]);

Route::get('index',[
  'as'=>'trang-chu',
  'uses'=>'PageController@getIndex'
]);

Route::get('product_type/{type}',[
  'as'=>'loai-san-pham',
  'uses'=>'PageController@getProductType'
]);

Route::get('all_products',[
  'as'=>'tat-ca-san-pham',
  'uses'=>'PageController@getAllProducts'
]);

Route::get('product/{id}',[
  'as'=>'chi-tiet-san-pham',
  'uses'=>'PageController@getProduct'
]);

Route::get('contact',[
  'as'=>'lien-he',
  'uses'=>'PageController@getContact'
]);

Route::get('about',[
  'as'=>'gioi-thieu',
  'uses'=>'PageController@getAbout'
]);

Route::get('add_to_cart/{id}',[
  'as'=>'them-vao-gio-hang',
  'uses'=>'PageController@getAddToCart'
]);

Route::get('del_cart/{id}',[
  'as'=>'xoa-trong-gio-hang',
  'uses'=>'PageController@getDelCart'
]);

Route::get('check_out',[
  'as'=>'dat-hang',
  'uses'=>'PageController@getCheckOut'
]);

Route::post('check_out',[
  'as'=>'dat-hang',
  'uses'=>'PageController@postCheckOut'
]);

Route::get('login',[
  'as'=>'dang-nhap',
  'uses'=>'PageController@getLogin'
]);

Route::post('login',[
  'as'=>'dang-nhap',
  'uses'=>'PageController@postLogin'
]);

Route::get('logout',[
  'as'=>'dang-xuat',
  'uses'=>'PageController@getLogout'
]);

Route::get('signup',[
  'as'=>'dang-ky',
  'uses'=>'PageController@getSignUp'
]);

Route::post('signup',[
  'as'=>'dang-ky',
  'uses'=>'PageController@postSignUp'
]);

Route::get('search',[
  'as'=>'tim-kiem',
  'uses'=>'PageController@getSearch'
]);
