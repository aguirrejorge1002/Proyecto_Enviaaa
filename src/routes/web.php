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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');

Route::resource('envio','App\Http\Controllers\EnvioController');
Route::post('envio/creates','App\Http\Controllers\EnvioController@store');
Route::post('envio/search','App\Http\Controllers\EnvioController@show');
Route::put('envio/edit','App\Http\Controllers\EnvioController@update');
