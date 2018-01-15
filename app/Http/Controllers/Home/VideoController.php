<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    //引入我的视频页面
    public function index()
    {
        return view('home.user_center.myVideo');
    }


    //引入观看记录页面
    public function v_history()
    {
        return view('home.user_center.history');
    }
}
