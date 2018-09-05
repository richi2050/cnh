<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('post/list/pre','PostPreController@getData')->name('list_post');
Route::get('post/list/create/pro','PostProController@create')->name('create_post_pro');
Route::get('post/pre/search','PostPreController@searchPost')->name('autocomplete_post_pre');

