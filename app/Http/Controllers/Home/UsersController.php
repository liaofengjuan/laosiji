<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users;

class UsersController extends Controller
{
	//引入个人中心页面
    public function index(Request $request)
    {
        return view('home.user_center.index');
    }
}
