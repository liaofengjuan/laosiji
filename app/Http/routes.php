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
    return view('welcome');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	Route::get('/login','LoginController@index');
	Route::post('/login','LoginController@login');
	Route::post('/code','LoginController@code');
	Route::get('/','IndexController@index');
	Route::get('/info','IndexController@info');
	Route::resource('/user','UserController');
	Route::post('/user/username','UserController@username');
});
