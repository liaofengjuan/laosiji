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
});

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'adminLogin'],function(){
	
	Route::post('/login/signout','LoginController@signout');//注销

	Route::get('/','IndexController@index');
	Route::get('/user/hander','UserController@hander');//加载管理员列表
	Route::post('/user/username','UserController@username');//验证用户名
	Route::post('/user/phone','UserController@phone');//验证手机号
	
	Route::resource('/user','UserController');//
	

	//视频分类
	Route::get('/videoType/addSon/{id}','VideoTypeController@addSon');//添加子类
	Route::post('/videoType/storeSon/{pid}','VideoTypeController@storeSon');//执行添加子类
	Route::resource('/videoType','VideoTypeController');

	//视频
	Route::get('/video/review','VideoController@review');//加载审核视频列表页
	Route::post('/video/pass/{id}','VideoController@pass');//审核视频
	Route::post('/video/searchSon/{pid}','VideoController@searchSon');//查询子类的信息
	Route::resource('/video','VideoController');


	//友情链接
	Route::post('/friend/uploadImg','FriendController@uploadImg');//上传图片
	Route::resource('/friend','FriendController');


	//轮播图
	Route::resource('/slideshow','SlideshowController');

	//网站配置
	Route::resource('/config','ConfigController');

	//广告表
	Route::resource('/advertise','AdvertiseController');

	//后台首页
	Route::resource('/','IndexController');

});


//前台路由组
Route::group(['namespace'=>'Home'],function()
{
	//前台首页
	Route::get('/',"IndexController@index");
	//前台--换一组
	Route::get('/changeGroup',"IndexController@changeGroup");
	//执行注销
	Route::get('/signout',"IndexController@signout");

	//登录
	Route::controller('/login','LoginController');
	//创建验证码
	Route::get('/create_code/{id}',"LoginController@create_code");

	//注册
	Route::controller('/register','RegisterController');

	//个人中心路由组
	Route::group(['middleware' => 'loginStatus'],function(){
		//个人中心个人资料
		Route::controller('/center/self',"UsersController");

		//个人中心视频管理
		Route::controller('/center/video','VideoController');
		Route::resource('/center/video','VideoController');
	});

	//视频列表页--隐式控制器
	Route::controller('/video/list','ListController');
	//视频播放页
	Route::controller('/video/play','VideoplayController');
});
