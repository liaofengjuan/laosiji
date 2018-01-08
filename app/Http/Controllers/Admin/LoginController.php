<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;//使用登录请求类
use App\Model\User;//使用模型

class LoginController extends Controller
{
    
    /**
     * 加载登录页面
     *
     */
    public function index()
    {
        return view('admin.login');
    }
    
    /**
     * 执行登录
     */
    public function login(LoginRequest $request)
    {
        //获取用户提交的信息
        $data = $request -> except('_token');
        //查询数据库有没有该用户
        $order = User::where('phone',$data['phone']) -> first();
        if($order){
            //判断密码是否正确
            if($order->password == $data['password']){
                return redirect('admin');
            }else{
                return back() -> with('error','密码错误');
            }
        }else{
           return back() -> with('error','用户名错误');
        }
    }
}
