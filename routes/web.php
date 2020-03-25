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

Route::get('/', 'HomeController@index')->name('mainIndex')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::Post('/ajax/save-news', 'NewsUserController@saveNews')->name('saveNews');

Route::get('my-news', 'NewsUserController@index')->name('myNews');

Route::get('my-news/{id}/delete', 'NewsUserController@delete')->name('deleteMyNews');
