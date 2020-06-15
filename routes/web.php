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

Route::get('/search-stock', 'SearchStockController@searchStock')->name('search-stock');
Route::get('/search-reactive', 'SearchReactiveController@searchReactive')->name('search-reactive');
Route::middleware('check_admin')->group(function () {
    Route::get('/upload-stock', 'UploadStockController@index')->name('upload-stock');
    Route::post('/upload-stock', 'UploadStockController@uploadStock')->name('upload-stock');
    Route::get('/upload-reactive', 'UploadReactiveController@index')->name('upload-reactive');
    Route::post('/upload-reactive', 'UploadReactiveController@uploadReactive')->name('upload-reactive');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
