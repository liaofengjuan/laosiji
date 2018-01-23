<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\VideoInfo;//使用模型
use App\Model\VideoType;//使用模型
use App\Model\User;//使用模型
use App\Model\History;//使用模型


class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         //获取搜索条件
        $search_type = $request->input('search_type');
        $search_content = $request->input('search_content');
        $requestall = $request->all();
        //实例化一个user表
        $video = new VideoInfo;
        // 判断where条件
        if($search_content!=''){
            $video = $video->where('video_title','like','%'.$search_content.'%');
        }
        $video = $video->where('check',1);
        $data = $video->paginate(10);
        $arr = array();
        foreach($data as $k=>$v){
            $stype = VideoType::where('id',$v['tid'])->first();//查询该电影的子类
            $ftype = VideoType::where('id',$stype['pid'])->first();//查询该电影的父类
            $v['type'] = $ftype['title'].'/'.$stype['title'];//拼接视频类型
            $arr[$k]=$v;//将信息赋值给$arr
        }
        return view('admin.video.index',['arr'=>$arr,'data'=>$data,'request'=>$requestall]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //查询分类表
        $data = VideoType::where('pid',0)->get();
        return view('admin.video.add',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取用户提交的数据
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
        $data['check'] = 1;
        //将电影信息存入数据库
        $res = VideoInfo::insert($data);
        if($res){
            return 0;//成功
        }else{
            return 1;//失败
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //通过视频id查询该视频的信息
        $res = VideoInfo::where('id',$id)->first();
        $stype = VideoType::where('id',$res['tid'])->first();
        $ftype = VideoType::where('id',$stype['id'])->first();
        $fid = $ftype['id'];
        $data = VideoType::where('pid',0)->get();
        //加载编辑页面
        return view('admin.video.edit',['res'=>$res,'data'=>$data,'fid'=>$fid,'stype'=>$stype]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //获取要修改的数据
        $data = $request->except(['_token','_method']);
        $data['updated_at'] = time();
        //执行修改
        $res = VideoInfo::where('id',$id)->update($data);
        if($res){
            return 0;//修改成功
        }else{
            return 1;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //执行删除
        $res = VideoInfo::where('id',$id)->delete();
        History::where('vid',$id)->delete();
        if($res){
            return 0;
        }else{
            return 1;
        }
    }

    /**
     * 查询子类的信息
     */
    public function searchSon($pid)
    {
        //通过pid查询子类
        $res = VideoType::where('pid',$pid)->get();
        if($res){
            return json_encode($res);
        }
    }

    /**
     * 加载审核视频列表页
     */
    public function review()
    {
        //查询需要审核的视频
        $data = VideoInfo::where('check',0)->get();
        $arr = array();
        foreach($data as $k=>$v){
            $stype = VideoType::where('id',$v['tid'])->first();//查询该电影的子类
            $ftype = VideoType::where('id',$stype['pid'])->first();//查询该电影的父类
            $v['type'] = $ftype['title'].'/'.$stype['title'];//拼接视频类型
            $arr[$k]=$v;//将信息赋值给$arr
        }
        return view('admin.video.review',['arr'=>$arr]);
    }

     /**
     * 审核视频
     */
    public function pass($id)
    {   
        //审核视频
        $res = VideoInfo::where('id',$id)->update(['check'=>1]);
        if($res){
            return 0;//成功
        }else{
            return 1;
        }

    }
}
