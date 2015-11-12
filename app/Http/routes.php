<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('layouts.index');
});

Route::get('/{user_email}', function($user_email) {
	return view('dashboard');
});

Route::get('/account', 'AccountController@getIndex');

Route::get('/team', 'TeamController@getIndex');

Route::get('/pick', 'PickController@getIndex');