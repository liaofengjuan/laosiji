<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users;
use App\Model\User;
use App\Model\Userinfo;

class UsersController extends Controller
{
	//引入个人中心页面
    public function getIndex(Request $request)
    {
    	//查询用户详细信息
    	$res = User::where('username',session('user'))->first();
        return view('home.user_center.self.index',['data' => $res]);
    }


    //引入个人中心账户安全页
    public function getPsw()
    {
        return view('home.user_center.self.pass');
    }


    //修改用户详情数据
    public function postUpdateinfo(Request $request)
    {
        //执行修改数据
        $arr = $request->except('_token');
        $uid = User::where('username',session('user'))->value('id');
        $result = Userinfo::where('uid',$uid)->update($arr);
        if($result)
        {
            echo 2; //成功
            return;
        }else{
            echo 3; //失败
            return;
        }
    }


    //引入上传头像页面
    public function getShangchuan()
    {
        return view('home.user_center.self.sc');
    }


    //执行修改密码
    public function postDoupdate(Request $request)
    {
        //获取新旧密码
        $oldPass = $request -> input('oldPass');
        $newPass = $request -> input('newPass');
        //验证旧密码是否错误
        $res = User::where('username',session('user'))->first();
        if(!Hash::check($oldPass,$res['password']))
        {
            echo 2; //旧密码错误
            return;
        }else{
            $res = User::where('username',session('user'))->first();
            $res -> password = bcrypt($newPass);
            $result = $res -> save();
            //判断是否修改成功
            if($result)
            {
                //删除登录session
                $request->session()->forget('user');
                $request->session()->forget('pic');
                echo 3; //成功
                return;
            }else{
                echo 4; //失败
                return;
            }
        }
    }


    //执行图片上传
    public function postUploadimg(Request $request)
    {
        $disk = \Storage::disk('qiniu');
        $file = $request->file('pic');
        $extension = $file->getClientOriginalExtension();//获取文件后缀
        $fileName = md5(date('YmdHis',time())).'.'.$extension;//随机文件名
        $path = $file->getRealPath();
        $disk->put($fileName,fopen($path,'r+'));
        $filePath = $disk->getDriver()->downloadUrl($fileName);//获取文件的url
        return Response()->json([
            'filePath' => $filePath,
            'fileName' => $fileName,
            'message' => '2'
        ]);
    }


    //将头像路径存入数据库
    public function postInsertimg(Request $request)
    {
        //接收路径
        $path = $request -> input('path');
        //执行修改
        
        $uid = User::where('username',session('user'))->value('id');
        $user = Userinfo::where('uid',$uid)->first();
        $user -> pic = $path;
        $result = $user -> save();
        if($result)
        {
            session(['pic'=>$path]);
            echo 2; //成功
            return;
        }else{
            echo 3;
            return;
        }
    }


    //引入购买vip页面
    public function getVip()
    {
        return view('home.user_center.self.vip');
    }


    //执行vip充值
    public function postBuyvip(Request $request)
    {
        //获取用户选择
        $vtime = $request -> input('vtime');
        //查出当前用户信息
        $uid = User::where('username',session('user')) -> value('id');
        $userinfo = UserInfo::where('uid',$uid) -> first();
        $viptime = $userinfo['vip_time'] - time(); //获取当前用户的vip是否有效

        if($viptime > 0)
        {
            $time = $vtime*60*60*24*30 + $viptime + time();
        }else{
            $time = $vtime*60*60*24*30 + time();
        }

        $userinfo -> vip_time = $time;
        $res = $userinfo -> save();
        if($res)
        {
            $uu = User::where('id',$uid)->first();
            $uu -> authority = 1;
            $uu -> save();
            session(['vip' => '6']);
            echo 2; //成功
        }else{
            echo 3; //失败
        }
    }
}
