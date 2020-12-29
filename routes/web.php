<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

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
    return redirect('/dashboard');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index');

Route::get('/item/list', 'ItemController@index');
Route::get('/item/create', 'ItemController@create');
Route::get('/item/bulk-create', 'ItemController@bulkCreate');
Route::post('/item', 'ItemController@store');
Route::post('/item/bulk-store', 'ItemController@bulkStore');
Route::get('/item/show/{id}', 'ItemController@show');
Route::get('/item/edit/{id}','ItemController@edit');
Route::patch('/item/update/{id}', 'ItemController@update');

Route::post('/defect/{id}', 'DefectController@store');

Route::get('/monitor/list', 'MonitorController@index');
Route::get('/monitor/create', 'MonitorController@create');
Route::get('/monitor/bulk-create', 'MonitorController@bulkCreate');
Route::get('/monitor/show/{id}', 'MonitorController@show');
Route::post('/monitor', 'MonitorController@store');
Route::post('/monitor/bulk-store', 'MonitorController@bulkStore');
Route::get('/monitor/edit/{id}' ,'MonitorController@edit');
Route::patch('/monitor/update/{id}', 'MonitorController@update');

Route::get('/vendor/list', 'VendorController@index');
Route::get('/vendor/create', 'VendorController@create');
Route::get('/vendor/show/{id}', 'VendorController@show');
Route::post('/vendor', 'VendorController@store');
Route::get('/vendor/edit/{id}' ,'VendorController@edit');
Route::patch('/vendor/update/{id}', 'VendorController@update');

Route::get('/accessory/list', 'AccessoryController@index');
Route::get('/accessory/create', 'AccessoryController@create');
Route::get('/accessory/show/{id}', 'AccessoryController@show');
Route::post('/accessory', 'AccessoryController@store');
Route::get('/accessory/edit/{id}' ,'AccessoryController@edit');
Route::patch('/accessory/update/{id}', 'AccessoryController@update');