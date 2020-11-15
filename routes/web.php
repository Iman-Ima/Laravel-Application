<?php

use App\Http\Controllers;
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

Route::resource('contact', 'App\Http\Controllers\ContactController');


Route::post('contact/update', 'App\Http\Controllers\ContactController@update')->name('contact-update');

Route::get('contact/destroy/{id}', 'App\Http\Controllers\ContactController@destroy');
