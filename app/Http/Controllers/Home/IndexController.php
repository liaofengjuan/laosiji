<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\VideoType;
use App\Model\VideoInfo;
use App\Model\Slideshow;//使用轮播图模型
use App\Model\Advertise;//使用广告模型

class IndexController extends Controller
{
    //前台页面
    public function index()
    {
        //查询板块、视频数据放主页进行遍历
        $arr = array();
        $fulei = VideoType::where('pid',0)
                            ->where('status',0)
                            ->get();
        //循环出父类id
        foreach($fulei as $v)
        {
            //获取所有父类下的子类id
            $son_id = VideoType::where('pid',$v->id)
                                ->where('status',0)
                                ->lists('id');
            //查询该父类下所有的电影，并按照点击量排序，取5条
            $father_movie = VideoInfo::whereIn('tid',$son_id)
                                        ->where('status',0)
                                        ->where('check',1)
                                        ->orderBy('clicks','desc')
                                        ->skip(0)
                                        ->take(5)
                                        ->get();
            //将所有电影和父类拼成数组
            $arr[$v->title] = $father_movie;
            
        }
        //查询轮播图信息
        $data_slideshow = Slideshow::where('status',0)->get();
        //排行榜---按点击量查询所有电影
        $hot = VideoInfo::where('status',0)
                        ->where('check',1)
                        ->orderBy('clicks', 'desc')
                        ->skip(0)
                        ->take(8)
                        ->get();

        //原创精品
        $onlyVideo = VideoType::where('pid',2)
                                ->where('status',0)
                                ->get();
        //获取视频类中所有的子类
        $onlyIds = array();
        //找到该子类下所有的视频
        foreach($onlyVideo as $v){
            //查询每个子类中所有的视频
            $onlyIds[] = $v['id'];
        }
        //获取原创精品电影信息
        $onlyMovies = VideoInfo::whereIn('tid',$onlyIds)
                                ->where('status',0)
                                ->where('check',1)
                                ->orderBy('clicks','desc')
                                ->skip(0)
                                ->take(5)
                                ->get();
        
        //查询广告
        $advertise = Advertise::where('status',0)->skip(0)->take(4)->get();
        //引入前台页面
        return view('home.index',['data' => $arr,'advertise' => $advertise,'data_slideshow'=>$data_slideshow,'hot'=>$hot,'onlyMovies'=>$onlyMovies]);
    }

    //执行注销
    public function signout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->forget('pic');
        return back();
    }

    /**
     * 换一组
     */
    public function changeGroup(Request $request)
    {
        //获取父类的名称
        $title = $request->input('title');
        //通过父类的名称查询该父类下所有的子类
        $id = VideoType::where('title',$title)->first()->id;
        $sonTypeIds = VideoType::where('pid',$id)->where('status',0)->lists('id');
        //查询该父类下所有的电影，并按照点击量排序，取5条
        $movies = VideoInfo::whereIn('tid',$sonTypeIds)
                                    ->where('status',0)
                                    ->where('check',1)
                                    ->orderBy('clicks','desc')
                                    ->skip(0)
                                    ->take(5)
                                    ->get();

    }
    
}
