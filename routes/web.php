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
Route::get('index','PageController@index');
Route::get('loaisanpham/{type}','PageController@loaisanpham');
Route::get('chitietsanpham/{type}','PageController@chitietsanpham');
Route::get('gioithieu', 'PageController@gioithieu');
Route::get('lienhe', 'PageController@lienhe');
Route::get('addtocard/{id}', 'PageController@addtocard');
Route::get('delcard/{id}', 'PageController@delcard');
Route::get('dathang', 'PageController@dathang');
Route::post('dathang', 'PageController@postdathang');
Route::get('dangki','PageController@dangki');
Route::post('dangki','PageController@postdangki');
Route::get('dangnhap','PageController@dangnhap');
Route::post('dangnhap','PageController@postdangnhap');
Route::get('dangxuat','PageController@dangxuat');
Route::get('timkiem','PageController@timkem');