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


Route::name('web.')->prefix('{lang?}')->middleware('locale')->group(function(){

	Route::get('/', 'HomeController@index')->name('home');

	Route::get('/bookmarks', 'BookmarkController@index')->name('bookmarks');

});
