<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\VideoType;
use App\Model\VideoInfo;
use App\Model\User;
use App\Model\History;

class VideoController extends Controller
{
    //引入我的视频页面
    public function index(Request $request)
    {   
        //查询我上传的视频
        $all = $request->all();
        $uid = User::where('username',session('user'))->value('id');
        $video = VideoInfo::where('uid',$uid);
        //获取搜索条件
        $video_name = $request->input('video_name');
        if($video_name!='')
        {
            $video = $video -> where('video_title','like','%'.$video_name.'%');
        }
        
        $data = $video -> paginate(2);
        return view('home.user_center.video.myVideo',['data' => $data,'tiaojian' => $all]);
    }


    //引入上传视频页面
    public function vupload()
    {
        //查出所有父级分类
        $father = VideoType::where('pid',0)->get();
        return view('home.user_center.video.up_video',['data' => $father]);
    }


    //引入观看记录页面
    public function vhistory()
    { 
        $vid = User::where('username',session('user'))
            ->first()
            ->history()
            ->orderBy('created_at','desc')
            ->take(10)
            ->lists('vid');

        $arr = [];
        foreach($vid as $v)
        {
            $arr[] = VideoInfo::where('id',$v)->first();
        }
        return view('home.user_center.video.history',['data'=>$arr]);
    }


    //获取子类
    public function getson($pid)
    {
        //通过pid查询子类
        $res = VideoType::where('pid',$pid)->get();
        if($res){
            return json_encode($res);
        }
    }


    //上传视频
    public function store(Request $request)
    {
        // 获取用户提交的数据
        $data = $request->except(['_token','fu','pic','play','zi']);
        //上传图片
        $disk = \Storage::disk('qiniu');
        $pic = $request->file('pic');
        $picExtension = $pic->getClientOriginalExtension();//获取文件后缀
        $picName = md5(date('YmdHis',time())).'.'.$picExtension;//随机文件名
        $picPath = $pic->getRealPath();//获取文件在缓存中的路径
        $disk->put($picName,fopen($picPath,'r+'));//上传至七牛云
        // 上传文件
        $play = $request->file('play');
        $playExtension = $play->getClientOriginalExtension();
        $playName = md5(date('YmdHis',time())).'.'.$playExtension;
        $playPath = $play->getRealPath();
        $disk->put($playName,fopen($playPath,'r+'));

        //将文件新名和图片新名存入数组中
        $data['pic'] = $picName;
        $data['play'] = $playName;
        $data['created_at'] = time();
        $data['tid'] = $request->input('zi');
        //获取用户的id
        $username = session('user');
        $res = User::where('username',$username)->first();
        $data['uid'] = $res['id'];
        //将电影信息存入数据库
        $res = VideoInfo::insert($data);
        if($res){
            return 2;//成功
        }else{
            return 3;//失败
        }
    }


    //编辑视频信息页面
    public function edit($id)
    {
        $father = VideoType::where('pid',0)->get();
        $res = VideoInfo::where('id',$id)->first();
        $erji = VideoType::where('id',$res['tid'])->first();
        return view('home.user_center.video.edit_video',['erji' => $erji,'data' => $father,'vinfo' => $res]);
    }


    //执行视频信息修改
    public function update(Request $request,$id)
    {
        // 获取用户提交的数据
        $data = $request->except(['_method','_token','fu','zi']);
        $data['tid'] = $request -> input('zi');
        $res = VideoInfo::where('id',$id)->update($data);
        if($res){
            //删除浏览记录表中的该视频
            History::where('vid',$id)->delete();
            return 2;//成功
        }else{
            return 3;//失败
        }
    }


    //执行删除视频
    public function destroy($id)
    {
        //执行删除
        $res = VideoInfo::where('id',$id)->delete();
        if($res){
            //删除历史记录的视频
            History::where('vid',$id)->delete();
            return 2; //成功
        }else{
            return 3; //失败
        }
    }


    //执行批量删除视频
    public function deletes(Request $request)
    {
        $data = $request->input('arr');
        $res = VideoInfo::whereIn('id',$data)->delete();
        if($res)
        {
            //删除浏览记录表中的该视频
            History::whereIn('vid',$data)->delete();
            echo 2; //成功
        }else{
            echo 3; //失败
        }
    }
}
