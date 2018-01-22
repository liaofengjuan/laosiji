<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Comment;
use App\Model\Reply;
use App\Model\User;
use DB;

class CommentController extends Controller
{
    //引入个人中心评论管理页面
    public function getIndex()
    {
        //获取uid
        $uid = User::where('username',session('user'))->value('id');
        $com = Comment::where('uid',$uid)->paginate(4);
        return view('home.user_center.reply.comment',['comment'=>$com]);
    }

    //引入个人中心回复管理页面
    public function getReplyy()
    {
        //获取uid
        $uid = User::where('username',session('user'))->value('id');
        $rep = Reply::where('uid',$uid)->paginate(4);
        return view('home.user_center.reply.reply',['reply'=>$rep]);
    }

    //编辑页面
    public function getEdit($id,$type)
    {
        if($type == '3') //编辑评论
        {
            $data = Comment::where('id',$id)->first();
            $jb = 3;
        }else if($type == '4') //编辑回复
        { 
            $data = Reply::where('id',$id)->first();
            $jb = 4;
        }
        
        return view('home.user_center.reply.edit',['data'=>$data,'jb'=>$jb]);
    }

    //执行修改
    public function postDoupdate(Request $request)
    {
        $type = $request->input('type');
        $id = $request->input('id');
        $content = $request->input('content');
        if($type == '3') //编辑评论
        {
            $res = Comment::where('id',$id)->update(['content'=>$content]);
        }else if($type == '4') //编辑回复
        {
            $res = Reply::where('id',$id)->update(['content'=>$content]);
        }
        if($res)
        {
            echo 3; //yes
        }else{
            echo 4; //no
        }
    }

    //删除评论
    public function postDestroy(Request $request)
    {
        //
        $id = $request -> input('id');
        $res = Comment::where('id',$id)->delete();
        if($res)
        {
            Reply::where('comment_id',$id)->delete();
            return 2; //成功
        }else{
            return 3; //失败
        }
    }

    //删除回复
    public function postDestroyh(Request $request)
    {
        $id = $request -> input('id');
        $res = Reply::where('id',$id)->delete();
        if($res)
        {
            return 2; //成功
        }else{
            return 3; //失败
        }
    }
}
