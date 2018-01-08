<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //注册页面
    public function index()
    {
        //引入注册页面
        return view('home.register');
    }

    
    //执行注册
    public function do_register(Request $request)
    {
        //接受数据
        $phone = $request->input('phone');
        $pass = $request->input('pass');
        //判断该手机号是否已经注册
        $res = User::where('phone',$phone)->first();
        if($res){
            echo 2;  //手机号已注册
        }else{
            $users = new User;
            $users -> phone = $phone;
            $users -> password = $pass;
            $result = $users -> save();
            //判断是否注册成功
            if($result){
                echo 1;   //注册成功
            }else{
                echo 3;
            }
        }
    }
}
