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

Route::get('/update-stock', 'UpdateStockController@index')->name('update-stock');
Route::post('/update-stock', 'UpdateStockController@uploadStock')->name('update-stock');

Route::get('/update-reactive', 'UpdateReactiveController@index')->name('update-reactive');
Route::post('/update-reactive', 'UpdateReactiveController@uploadReactive')->name('update-reactive');

Route::middleware('check_admin')->group(function () {
    Route::get('/remove-stock', 'RemoveStockController@index')->name('remove-stock');
    Route::post('/remove-stock', 'RemoveStockController@removeStock')->name('remove-stock');

    Route::get('/remove-reactive', 'RemoveReactiveController@index')->name('remove-reactive');
    Route::post('/remove-reactive', 'RemoveReactiveController@removeReactive')->name('remove-reactive');

    Route::get('/manage-users', 'ManageUsersController@index')->name('manage-users');
    Route::post('/manage-users', 'ManageUsersController@setAsAdmin')->name('set-as-admin')->middleware(['auth', 'password.confirm']);;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
