<?php

use Illuminate\Support\Facades\Route;

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
Route::get("/","Auth\LoginController@user_login");
Route::post('login','Auth\LoginController@login')->name('login');

Route::middleware(['Preventhistory', 'CheckAdmin'])->group(function () 
{
    Route::get('customer-list','CustomerController@index')->name('index');
	Route::get('customer','CustomerController@create')->name('customer');
	Route::get('delete-customer/{id}','CustomerController@delete_customer')->name('delete_customer');
	Route::get('edit-customer/{id}','CustomerController@edit_customer')->name('edit_customer');
	Route::get('customer-location-list','CustomerLocationController@index')->name('index');
	Route::get('add-customer-location','CustomerLocationController@create')->name('CustomerLocationController');
	Route::get('delete-customer-location/{id}','CustomerLocationController@delete_customer_location')->name('delete_customer_location');
	Route::get('edit-customer-location/{id}','CustomerLocationController@edit_customer_location')->name('edit_customer_location');
	Route::get('orders-list','OrderController@index')->name('orders-list');
	Route::get('add-order','OrderController@create')->name('add-order');
	Route::get('delete-order/{id}','OrderController@delete_order')->name('delete_order');
	Route::get('edit-order/{id}','OrderController@edit_order')->name('edit_order');
	Route::get('order/get_customer_id{id}','OrderController@get_customer_id')->name('get_customer_id');
	Route::get('order/get_update_customer_id{id}','OrderController@get_update_customer_id')->name('get_update_customer_id');
	
});
Route::get('export-order','OrderController@export')->name('export');
Route::get('logout','Auth\LoginController@logout');
Route::post('add-customer','CustomerController@insert_customer')->name('insert_customer');
Route::post('update-customer','CustomerController@update_customer')->name('update_customer');
Route::post('add-customer-location','CustomerLocationController@insert_customer_location')->name('insert_customer_location');
Route::post('update-customer-location','CustomerLocationController@update_customer_location')->name('update_customer_location');
Route::post('update-order','OrderController@update_order')->name('update_order');
Route::post('add-order','OrderController@insert_order')->name('insert_order');