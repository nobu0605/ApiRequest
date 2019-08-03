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

Route::get('/index', 'ApiRequestController@index');
Route::post('/index', 'ApiRequestController@apiRequest');
Route::get('/index2', 'ApiRequestController@apiRequest2');
