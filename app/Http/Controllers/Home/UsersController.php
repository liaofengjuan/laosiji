<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users;
use App\Model\User;

class UsersController extends Controller
{
	//引入个人中心页面
    public function index(Request $request)
    {
    	//查询用户详细信息
    	$id = User::where('username',session('user'))->first()['id'];
    	$res = User::find($id);
        return view('home.user_center.index',['data' => $res]);
    }

    //引入个人中心账户安全页
    public function psw()
    {
        return view('home.user_center.pass');
    }
}
