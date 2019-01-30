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

Route::get('/', 'RootController@show');

Route::group(["prefix" => "calendar"], function() {
    Route::redirect('/', '/year');
    Route::get('/{year}/{month}/{day}', 'CalendarController@showDay');
    Route::get('/{year}/{month}', 'CalendarController@showMonth');
    Route::get('/{year?}', 'CalendarController@showYear');
});

