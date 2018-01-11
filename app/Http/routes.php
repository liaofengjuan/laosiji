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
	Route::get('/login','LoginController@index');//加载登录页
	Route::post('/login','LoginController@login');//执行登录
	Route::get('/login/create_code/{id}','LoginController@create_code');//生成验证码
	Route::post('/login/signout','LoginController@signout');//退出登录

	Route::get('/','IndexController@index');
	Route::get('/user/hander','UserController@hander');//加载管理员列表
	Route::post('/user/username','UserController@username');//验证用户名
	Route::post('/user/phone','UserController@phone');//验证手机号
	

	Route::resource('/user','UserController');
	

	//视频
	Route::get('/video/info/{id}','VideoController@info');//查看详情
	Route::resource('/video','VideoController');

	//友情链接
	Route::post('/friend/uploadImg','FriendController@uploadImg');//上传图片
	Route::resource('/friend','FriendController');

});


//前台路由组
Route::group(['namespace'=>'Home'],function()
{

	//前台首页
	Route::get('/',"IndexController@index");

	//登录页面
	Route::get('/login',"LoginController@index");
	//创建验证码
	Route::get('/create_code/{id}',"LoginController@create_code");
	//执行登录
	Route::post('/do_login',"LoginController@do_login");
	//发送手机验证码
	Route::post('/alidayu',"LoginController@alidayu");
	//执行短信验证登录
	Route::post('/phone_login',"LoginController@phone_login");

	//注册页面
	Route::get('/register',"RegisterController@index");
	//执行注册
	Route::post('/do_register',"RegisterController@do_register");

	//个人中心首页
	Route::get('/center',"UsersController@index");

	//视频列表页
	Route::get('/list','ListController@index');
});

