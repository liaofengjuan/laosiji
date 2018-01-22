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
                    ->orderBy('clicks','desc')
                    ->paginate(10);
        //引入列表页
        return view('home.list',['movies'=>$movies,'title'=>$title,'sonType'=>$sonType]);
    }

    /**
     * 搜索子类
     * 搜索vip:情况一 子类：有  是否vip：全部
     */
    public function postHall(Request $request)
    {
        //获取子类的title
        $sid = $request -> input('sid');
        $orders = $request -> input('orders');
        if($orders==1){
            $movies = VideoInfo::where('tid',$sid)
                            ->where('status',0)
                            ->where('check',1)
                            ->orderBy('created_at','desc')
                            ->get();
        }else{
            $movies = VideoInfo::where('tid',$sid)
                            ->where('status',0)
                            ->where('check',1)
                            ->orderBy('clicks','desc')
                            ->get();
        }
        
        if($movies){
            return json_encode($movies);
        }else{
            return 1;//没有数据
        }
 
    }

    /**
     * 搜索vip:情况二 子类：全部  是否vip：全部
     */
    public function postAall(Request $request)
    {
        //获取父id
        $fid = $request -> input('fid');
        $orders = $request -> input('orders');
        //获取该父类下的所有子id
        $sid = VideoType::where('pid',$fid)->where('status',0)->lists('id');
        //查询该父类下面的所有的电影
        if($orders==1){
             $movies = VideoInfo::whereIn('tid',$sid)
                            ->where('status',0)
                            ->where('check',1)
                            ->orderBy('created_at','desc')
                            ->get();
        }else{
            $movies = VideoInfo::whereIn('tid',$sid)
                            ->where('status',0)
                            ->where('check',1)
                            ->orderBy('clicks','desc')
                            ->get();
        }
        
        if($movies){
            return json_encode($movies);
        }else{
            return 1;//没有数据
        }
    }

     /**
     * 搜索vip:情况三 子类：全部  是否vip：免费
     */
    public function postAfree(Request $request)
    {
        //获取父id
        $fid = $request -> input('fid');
        $orders = $request -> input('orders');
        //获取该父类下的所有子id
        $sid = VideoType::where('pid',$fid)->where('status',0)->lists('id');
        //查询该父类下面的所有的电影
        if($orders==1){
            $movies = VideoInfo::whereIn('tid',$sid)
                            ->where('status',0)
                            ->where('check',1)
                            ->where('vip',0)
                            ->orderBy('created_at','desc')
                            ->get();
        }else{
            $movies = VideoInfo::whereIn('tid',$sid)
                            ->where('status',0)
                            ->where('check',1)
                            ->where('vip',0)
                            ->orderBy('clicks','desc')
                            ->get();
        }
        if($movies){
            return json_encode($movies);
        }else{
            return 1;//没有数据
        }
    }

     /**
     * 搜索vip:情况四 子类：有  是否vip：免费
     */
    public function postHfree(Request $request)
    {
        //获取子类的title
        $sid = $request -> input('sid');
        $orders = $request -> input('orders');
        if($orders==1){
            $movies = VideoInfo::where('tid',$sid)
                            ->where('status',0)
                            ->where('check',1)
                            ->where('vip',0)
                            ->orderBy('created_at','desc')
                            ->get();
        }else{
            $movies = VideoInfo::where('tid',$sid)
                            ->where('status',0)
                            ->where('check',1)
                            ->where('vip',0)
                            ->orderBy('clicks')
                            ->get();
        }
        
        if($movies){
            return json_encode($movies);
        }else{
            return 1;//没有数据
        }
    }
    /**
     * 搜索vip:情况五 子类：全部  是否vip：vip
     */
    public function postAvip(Request $request)
    {
        //获取父id
        $fid = $request -> input('fid');
        $orders = $request -> input('orders');
        //获取该父类下的所有子id
        $sid = VideoType::where('pid',$fid)->where('status',0)->lists('id');
        //查询该父类下面的所有的电影
        if($orders==1){
            $movies = VideoInfo::whereIn('tid',$sid)
                            ->where('status',0)
                            ->where('check',1)
                            ->where('vip',1)
                            ->orderBy('created_at','desc')
                            ->get();
        }else{
            $movies = VideoInfo::whereIn('tid',$sid)
                            ->where('status',0)
                            ->where('check',1)
                            ->where('vip',1)
                            ->orderBy('clicks')
                            ->get();
        }
        
        if($movies){
            return json_encode($movies);
        }else{
            return 1;//没有数据
        }
    }
    /**
     * 搜索vip:情况四 子类：有  是否vip：vip
     */
    public function postHvip(Request $request)
    {
        //获取子类的title
        $sid = $request -> input('sid');
        $orders = $request -> input('orders');
        if($orders==1){
            $movies = VideoInfo::where('tid',$sid)
                            ->where('status',0)
                            ->where('check',1)
                            ->where('vip',1)
                            ->orderBy('clicks')
                            ->get();
        }else{
            $movies = VideoInfo::where('tid',$sid)
                            ->where('status',0)
                            ->where('check',1)
                            ->where('vip',1)
                            ->orderBy('created_at','desc')
                            ->get();
        }
    
        if($movies){
            return json_encode($movies);
        }else{
            return 1;//没有数据
        }
    }
    
}
