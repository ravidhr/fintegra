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
    return view('signin');
});
Route::get('/dashboard','DashboardController@home');
Route::get('/barang/list','BarangController@list_barang');
Route::post('/barang/list','BarangController@list_post');
Route::get('/barang/update/{id}','BarangController@update_barang_show');
Route::get('/barang/delete/{id}','BarangController@delete_barang');
Route::post('/barang/update/{id}','BarangController@update_barang');
Route::get('/barang/add','BarangController@add_barang_show');
Route::post('/barang/add','BarangController@add_barang_insert');
Route::get('/kupon/add','KuponController@add_kupon_show');
Route::post('/kupon/add','KuponController@add_kupon_insert');
Route::get('/kupon/update/{id}','KuponController@update_kupon_show');
Route::post('/kupon/update/{id}','KuponController@update_kupon');
Route::get('/kupon/list','KuponController@kupon_list');
Route::get('/kupon/delete/{id}','KuponController@delete_kupon');
Route::get('/penjualan','PenjualanController@list_penjualan');
Route::post('/penjualan','PenjualanController@penjualan_search');
Route::get('/penjualan/delete/{id}','PenjualanController@delete_penjualan');
