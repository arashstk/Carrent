<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\HistoryController;
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
    return view('index');
});



// Route::get('customer', 'App\Http\Controllers\CustomerController@index');

Route::get('customers', [CustomerController::class, 'index']);

Route::get('add_customer', 'App\Http\Controllers\CustomerController@add');
Route::post('add_customer', 'App\Http\Controllers\CustomerController@save');

Route::get('customer/remove/{person_number}', 'App\Http\Controllers\CustomerController@remove');

Route::get('customer/edit/{person_number}', 'App\Http\Controllers\CustomerController@edit');
Route::post('customer/edit/{person_number}', 'App\Http\Controllers\CustomerController@update');

///Now we should prepide some routes for cars:


Route::get('add_car', 'App\Http\Controllers\CarController@add');
Route::post('add_car', 'App\Http\Controllers\CarController@save');

Route::get('cars', [CarController::class, 'index']); 

Route::get('car/remove/{id}', 'App\Http\Controllers\CarController@remove');

Route::get('car/edit/{id}', 'App\Http\Controllers\CarController@edit');
Route::post('car/edit/{id}', 'App\Http\Controllers\CarController@update');


Route::get('checkout', [CheckController::class, 'get_checkout']); 
Route::post('checkout', [CheckController::class, 'post_checkout']);

Route::get('checkin',  [CheckController::class, 'get_checkin']);
Route::post('checkin', [CheckController::class, 'post_checkin']);

Route::get('history', [HistoryController::class, 'get_history']);
Route::post('history', [HistoryController::Class, 'post_history']);
