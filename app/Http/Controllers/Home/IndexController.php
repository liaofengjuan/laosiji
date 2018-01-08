<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\VideoType;

class IndexController extends Controller
{
    //前台页面
    public function index()
    {
        //查询板块、视频数据放主页进行遍历
        // $father = VideoType::where('pid',0)->get();
        // foreach($father as $key=>$val){
        //     VideoType::where('pid',$val['id'])->
        // }

        //引入前台页面
        return view('home.index');
    }


    
}
