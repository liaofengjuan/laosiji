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
	

	Route::resource('/user','UserController');
	

	//视频分类
	Route::get('/videoType/addSon/{id}','VideoTypeController@addSon');//添加子类
	Route::post('/videoType/storeSon/{pid}','VideoTypeController@storeSon');//执行添加子类
	Route::resource('/videoType','VideoTypeController');

	//视频
	Route::get('/video/review','VideoController@review');//加载审核视频列表页
	Route::post('/video/searchSon/{pid}','VideoController@searchSon');//查询子类的信息
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
	//执行注销
	Route::get('/signout',"IndexController@signout");

	//登录页面
	Route::get('/login',"LoginController@index");
	//创建验证码
	Route::get('/create_code/{id}',"LoginController@create_code");
	//执行登录
	Route::post('/do_login',"LoginController@do_login");
	//检测手机是否注册
	Route::post('/test_phone',"LoginController@test_phone");
	//发送手机验证码
	Route::post('/alidayu',"LoginController@alidayu");
	//执行短信验证登录
	Route::post('/phone_login',"LoginController@phone_login");

	//注册页面
	Route::get('/register',"RegisterController@index");
	//执行注册
	Route::post('/do_register',"RegisterController@do_register");

	//个人中心路由组
	Route::group(['middleware' => 'loginStatus'],function(){
		//个人中心首页
		Route::get('/center/self',"UsersController@index");
		//修改用户详情数据
		Route::post('/center/self/update_info',"UsersController@update_info");
		//账户安全页
		Route::get('/center/self/pass',"UsersController@psw");
		//执行修改密码
		Route::post('/center/self/pass/do_update','UsersController@do_update');
		//上传头像页面
		Route::get('/center/self/sc','UsersController@shangchuan');
		//执行上传图片
		Route::post('/center/self/uploadimg','UsersController@uploadImg');
		//将路径存入数据库
		Route::post('/center/self/insert_img','UsersController@insert_img');
		//引入我的视频页面
		Route::get('/center/video/index','VideoController@index');
		//引入上传视频页面
		//？？ Route::get('/center/video/upload','VideoController@v_upload');
		//引入观看历史页面
		Route::get('/center/video/history','VideoController@v_history');
	});

	//视频列表页
	Route::get('/video/list','ListController@index');
	//视频播放页
	Route::get('/video/videoplay','VideoplayController@index');
});
