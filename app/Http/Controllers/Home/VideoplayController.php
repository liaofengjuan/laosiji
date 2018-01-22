<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\VideoInfo;
use App\Model\User;
use App\Model\History;
use App\Model\Comment;

class VideoplayController extends Controller
{
   public function getIndex($play_id)
   {
		//如果是登录状态存入该用户的观看记录表
      if(session('user'))
      {
         $uid = User::where('username',session('user'))->value('id');
         $res = History::where('uid',$uid)->where('vid',$play_id)->first();
         //如果该用户已看过该视频则只更新时间
         if($res==null)
         {
            $history = new History;
            $history -> uid = $uid;
            $history -> vid = $play_id;
            $history -> created_at = time();
            $history -> save();
         }else{
            $res -> created_at = time();
            $res -> save();
         }
      }


      //查询评论
      $com = Comment::where('vid',$play_id)->orderBy('created_at','desc')->paginate(2);
      //获取评论条数
      $count = Comment::where('vid',$play_id)->orderBy('created_at','desc')->count();
		//查询视频信息
		$res = VideoInfo::where('id',$play_id)->first();

      //查询相关视频
      $xiangguan = VideoInfo::where('tid',$res['tid'])->orderBy('clicks','desc')->take(10)->get();

      //推荐视频
      $tuijian = VideoInfo::orderBy('clicks','desc')->take(5)->get();

      return view('home.video.videoplay',['data' => $res,'count' => $count,'comment' => $com,'xiangguan' => $xiangguan,'tuijian' => $tuijian]);
   }
}
