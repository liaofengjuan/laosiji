<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;

use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
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

    //检测手机是否注册(阿里短信)
    public function test_phone(Request $request)
    {
        $phone = $request -> input('phone');
        //验证手机
        $res = User::where('phone',$phone)->first();
        if(!$res)
        {
            echo 2;
        }
    }

    //阿里短信
    public function alidayu(Request $request)
    {

        //获取手机号
        $phone = $request -> input('phone');

        $config = [
            'accessKeyId'    => 'LTAIu6DtG8qdFkFV',
            'accessKeySecret' => 'CjDTQo0OofsF3v729lJGlr72wmYFNz',
        ];

        //发送的验证码
        $code = rand(100000, 999999);

        $client  = new Client($config);
        $sendSms = new SendSms;
        $sendSms->setPhoneNumbers($phone);
        $sendSms->setSignName('李博雅');
        $sendSms->setTemplateCode('SMS_120376028');
        $sendSms->setTemplateParam(['code' => $code]);
        $sendSms->setOutId('demo');
        $client->execute($sendSms);

		//保存session
		session(['phone_code'=>$code]);
    }


    //执行短信验证登录
    public function phone_login(Request $request)
    {
        $phone = $request -> input('phone');
        $code = $request -> input('code');
        $p_code = $request -> input('p_code');
        //判断手机号
        $res_p = User::where('phone',$phone)->first();
        if(!$res_p)
        {
            echo 1; //手机号未注册
            return;
        }
        //判断手机校验码
        if($p_code != session('phone_code'))
        {
            echo 2; //手机校验码错误
            return;
        }
        //判断验证码
        if($code != session('code'))
        {
            echo 3; //验证码错误
            return;
        }
        session(['user' => $res_p['username']]);
        echo 4; //登录成功
    }
}
