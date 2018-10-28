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
//商家信息及账号修改
Route::get('shop/user_edit/{user}','ShopController@user_edit')->name('shop.user_edit');
Route::get('shop/shop_edit/{shop}','ShopController@shop_edit')->name('shop.shop_edit');
Route::put('shop/user_update/{user}','ShopController@user_update')->name('shop.user_update');
Route::put('shop/shop_update/{shop}','ShopController@shop_update')->name('shop.shop_update');
//商家登陆
Route::get('login','SessionController@login')->name('login');
Route::get('logout','SessionController@logout')->name('logout');
Route::post('store','SessionController@store')->name('store');
//商家注册
Route::resource('shop','ShopController');
//菜品
Route::resource('menu','MenuController');
//菜品分类
Route::resource('menu_category','MenuCategoryController');