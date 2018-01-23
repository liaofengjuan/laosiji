<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Comment;
use App\Model\Reply;
use App\Model\VideoInfo;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    //添加评论
    public function postAddcomment(Request $request)
    {
        //获取该用户id
        $user = User::where('username',session('user'))->first();
        if($user->userinfo['status'] == '1')
        {
            echo 44;
            return;
        }
        // 执行添加
        $com = new Comment;
        $id = $com -> insertGetId(['uid'=>$user['id'],'vid'=>$request->input('vid'),'content'=>$request->input('cont'),'created_at'=>time()]);
        // dd($res);
        // $com = Comment::where('vid',$request->input('vid'))->orderBy('created_at','desc')->get();
        $res = Comment::where('id',$id)->first();
        if($res)
        {
            return $res; //成功
        }else{
            echo 3; //失败
        }
    }

    //添加回复
    public function postInsreply(Request $request)
    {
        $user = User::where('username',session('user'))->first();
        if($user->userinfo['status'] == '1')
        {
            echo 44;
            return;
        }
        //获取评论数据
        $comment_id = $request->input('comment_id');
        $content = $request->input('content');
        $reply = new Reply;
        $reply -> comment_id = $comment_id;
        $reply -> content = $content;
        $reply -> uid = $user['id'];
        $reply -> created_at = time();
        $res = $reply -> save(); 

        
        if($res)
        {
            return $this->hqhf($comment_id);
        }else{
            echo 2; //失败
        }
    }

    //获取评论下的子回复
    public function postGreply(Request $request)
    {
        $comment_id = $request->input('comment_id');
        return $this->hqhf($comment_id);
    }

    //回去回复相关信息
    protected function hqhf($comment_id)
    {
        $arr = [];
        $zi = [];
        $data = Reply::where('comment_id',$comment_id)->orderBy('created_at','asc')->get();
        foreach($data as $k=>$v)
        {   
            $zi['time'] = date('Y-m-d H:i:s',$v->created_at);
            $zi['content'] = $v['content'];
            $zi['pic'] = $v->userinfo['pic'];
            $zi['username'] = $v->user['username'];
            $arr[] = $zi;
        }
        return $arr;
    }

    //执行点赞
    public function postGoods(Request $request)
    {   
        //获取视频id
        $id = $request -> input('id');
        $res = VideoInfo::where('id',$id)->first();
        $res -> good = $res['good'] + 1;
        $r = $res -> save();
        if($r)
        {
            return $res['good'];
        }else{
            echo 'cuo';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
