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





Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	Route::get('/login','LoginController@index');
	Route::post('/login','LoginController@login');
	Route::post('/code','LoginController@code');
	Route::get('/','IndexController@index');
	Route::resource('/user','UserController');
	Route::post('/user/username','UserController@username');//验证用户名
	Route::post('/user/phone','UserController@phone');//验证手机号
});

//前台路由组
Route::group(['namespace'=>'Home'],function(){

	//前台首页
	Route::get('/',"IndexController@index");

	//登录页面
	Route::get('/login',"LoginController@index");

	//注册页面
	Route::get('/register',"RegisterController@index");

	//执行注册
	Route::post('/do_register',"RegisterController@do_register");

	//个人中心首页
	Route::get('/center',"UsersController@index");

	//视频列表页
	Route::get('/list','ListController@index');
});

