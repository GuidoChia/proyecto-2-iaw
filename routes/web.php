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

Route::get('/search-stock', 'SearchStockController@index')->name('search-stock');
Route::get('/search-stock-result', 'SearchStockController@searchStock')->name('search-stock-result');

Route::get('/search-reactive', 'SearchReactiveController@index')->name('search-reactive');
Route::get('/search-reactive-result', 'SearchReactiveController@searchReactive')->name('search-reactive-result');

Route::middleware('check_admin')->group(function () {
    Route::get('/update-stock', 'UpdateStockController@index')->name('update-stock');
    Route::post('/update-stock', 'UpdateStockController@uploadStock')->name('update-stock');
    Route::get('/update-reactive', 'UpdateReactiveController@index')->name('update-reactive');
    Route::post('/update-reactive', 'UpdateReactiveController@uploadReactive')->name('update-reactive');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
