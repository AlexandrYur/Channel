<?php

use \Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

//Channels management section
Route::get('/channels', 'ChannelsController@index');
Route::get('/channels/{channel}', 'ChannelsController@show');
Route::get('/create/channels/', 'ChannelsController@create');
Route::get('/destroy/channels/{channel}', 'ChannelsController@destroy');
Route::post('/channels', 'ChannelsController@store');


//Subscribe user on channel
Route::get('/subscribe', 'SubscribeController@index');
Route::post('/do/subscribe', 'SubscribeController@store');
