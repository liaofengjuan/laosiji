<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\VideoType;
use App\Model\VideoInfo;

class ListController extends Controller
{
    //列表页
    public function getIndex($title)
    {
        //查询该父类下的所有子类
        $fid = VideoType::where('title',$title)->first()->id;
        $sid = VideoType::where('pid',$fid)->where('status',0)->lists('id');
        $sonType = VideoType::where('pid',$fid)->where('status',0)->get();
        //查询父类下所有的电影
        $movies = VideoInfo::whereIn('tid',$sid)
                    ->where('status',0)
                    ->where('check',1)
                    ->orderBy('clicks')
                    ->paginate(10);
        //引入列表页
        return view('home.list',['movies'=>$movies,'title'=>$title,'sonType'=>$sonType]);
    }

    /**
     * 搜索子类
     */
    public function postLson(Request $request)
    {
        //获取子类的title
        $title = $request -> input('title');
        //查询盖子类下面的所有的电影
        $movies = VideoType::where('title',$title)->first()->videoinfo;
        if($movies){
            return json_encode($movies);
        }else{
            return 1;//没有数据
        }
        

    }

    /**
     * 搜索vip
     */
    public function postLvip(Request $request)
    {
        //获取父类和子类的title
        $fatherTitle = $request -> input('fatherTitle');
        $sonTitle = $request -> input('sonTitle');
        //查询盖子类下面的所有的电影
        $movies = VideoType::where('title',$title)->first()->videoinfo;
        dd($movies);
    }


    
}
