<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;

use Flc\Alidayu\Client;
use Flc\Alidayu\App;
use Flc\Alidayu\Requests\AlibabaAliqinFcSmsNumSend;
use Flc\Alidayu\Requests\IRequest;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

class LoginController extends Controller
{
    //引入登录页面
    public function index()
    {
    	//引入登录页面
        return view('home.login');
    }

    //创建验证码
    public function create_code()
    {
    	$builder = new CaptchaBuilder;
		$builder->build($width = 125);
		header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        //将验证码存入session
        session(['code' => $builder->getPhrase()]);
        return $builder->output();
    }


    //执行登录
    public function do_login(Request $request)
    {	
    	//接收登录数据
    	$user = $request -> input('user');
    	$pass = $request -> input('pass');
    	$code = $request -> input('code');

    	//查询手机号码是否存在
    	$res = User::where('phone',$user)->first();
    	if(!$res)
        {
    		$res = User::where('username',$user)->first();
    		if(!$res)
            {
    			echo 1; //用户名或手机号不存在
    			return;
    		}
    	}

        //匹配验证码
        $builder = new CaptchaBuilder;

        if(session('code') != $code)
        {
            echo 4; //验证码错误
            return;
        }
        
    	//匹配密码
    	if(Hash::check($pass,$res['password']))
        {
    		session(['user' => $res['username']]);
    		echo 2; //登录成功
    		return;
    	}else{
    		echo 3; //密码错误
    		return;
    	}
    }


    //阿里大鱼
    public function alidayu(Request $request){

        //获取手机号
        $phone = $request -> input('phone');
    	// 配置信息
		$config = [
		    'app_key'    => 'LTAIu6DtG8qdFkFV',
		    'app_secret' => 'CjDTQo0OofsF3v729lJGlr72wmYFNz',
		    // 'sandbox'    => true,  // 是否为沙箱环境，默认false
		];


		// 使用方法一
		$client = new Client(new App($config));
		$req    = new AlibabaAliqinFcSmsNumSend;
        $jiaoyanma = rand(100000, 999999);
		$req->setRecNum($phone)
		    ->setSmsParam([
		        'number' => $jiaoyanma
		    ])
		    ->setSmsFreeSignName('李博雅')
		    ->setSmsTemplateCode('SMS_120376028');

		$resp = $client->execute($req);

		//保存session
		// session(['phone_code'=>$jiaoyanma]);
    }


    //执行短信验证登录
    public function phone_login(Request $request)
    {

    }
}
