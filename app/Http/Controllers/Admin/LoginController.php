<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

//使用验证码类
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;//使用登录请求类
use App\Model\User;//使用模型
use Hash;//使用hash类



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
        //将所有的数据存入闪存
        $request -> flashExcept('_token');
        //获取用户提交的信息
        $data = $request -> except('_token');
        //判断code是否正确
        if($data['code'] != session('code')){
            return back() -> with('error','验证码错误');
        }
        //查询数据库有没有该用户
        $user = User::where('username',$data['username']) -> first();
        if(!$user){
            return back() -> with('error','用户名错误');
        }
        if($user->authority!=2){
            return back() -> with('error','您没有权限');
        }
        //判断密码是否正确
        if(Hash::check($data['password'],$user['password']))
        {
            session(['admins' => $user['username']]);//将用户名存入session
            return redirect('/admin');//登录成功
        }else{
            return back() -> with('error','密码错误');; //密码错误
        }
       
    }

    /**
     * 创建验证码类
     */
    public function create_code()
    {
        $builder = new CaptchaBuilder();
        $builder->build($width = 125);
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        //将验证码存入session
        session(['code' => $builder->getPhrase()]);
        return $builder->output();
    }

    /**
     * 退出登录
     */
    public function signout(Request $request)
    {
        //删除session中的值
        $res = $request -> session() -> forget('admins');
        if($res==null){
            return 0;//删除成功
        }else{
            return 1;
        }

    }

}
