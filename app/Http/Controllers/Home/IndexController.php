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
        $arr = array();
        $fulei = VideoType::where('pid',0)->get();
        //循环出父类id
        foreach($fulei as $v)
        {
            //获取所有父类下的子类id
            $son_id = VideoType::where('pid',$v->id)->lists('id');
            //获取该父类下的所有子类
            $movie = VideoType::whereIn('id',$son_id)->get();
            //循环取出电影
            foreach($movie as $val)
            {
                //将电影插入数组
                $arr[$v->title][] = $val->videoinfo;
            }
        }
        //引入前台页面
        return view('home.index',['data' => $arr]);
    }

    //执行注销
    public function signout(Request $request)
    {
        $request->session()->forget('user');
        return back();
    }
    
}
