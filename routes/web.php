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

Route::get('/search', 'SearchController@searchReactive')->name('search');
Route::middleware('check_admin')->group(function () {
    Route::get('/upload-stock', 'UploadStockController@index')->name('upload-stock');
    Route::get('/upload-reactive', 'UploadReactiveController@index')->name('upload-reactive');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
