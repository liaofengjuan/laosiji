<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\UserInfo;
use DB;

class RegisterController extends Controller
{
    //注册页面
    public function getIndex()
    {
        //引入注册页面
        return view('home.register');
    }

    
    //执行注册
    public function postDoregister(Request $request)
    {
        //接受数据
        $phone = $request->input('phone');
        $pass = $request->input('pass');
        $code = $request->input('code');
        //判断该手机号是否已经注册
        $res = User::where('phone',$phone)->first();
        if($res)
        {
            echo 2;  //手机号已注册
            return;          
        }else{
            //匹配验证码
            if($code != session('code')){
                echo 4;
                return;
            }
            $pass = bcrypt($pass); //密码哈希加密

            //生成随机用户名
            do{
                $arr_user = array_merge(range('a','z'),range(0,9));
                shuffle($arr_user);
                $username = implode("",array_slice($arr_user,0,6));
            }while(User::where('username',$username)->first());

            //开启事务
            DB::beginTransaction();
            //向User表加入信息
            $arr = ['phone'=>$phone,'password'=>$pass,'username'=>$username];
            $id = User::insertGetId($arr);
            //向UserInfo表插入数据
            $userinfo = new UserInfo;
            $userinfo -> uid = $id;
            $result = $userinfo -> save();

            //判断是否注册成功
            if($result && $id)
            {
                DB::commit();
                echo 1;   //注册成功
                return;
            }else{
                DB::rollBack();
                echo 3;  //找管理员
                return;
            }
        }
    }
}
