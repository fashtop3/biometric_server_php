<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/token', function() {
    return csrf_token();
});

Route::get('/data', 'CaptureController@index');
Route::post('/data', 'CaptureController@store');

Route::get('/', function () {
    return view('welcome');
});