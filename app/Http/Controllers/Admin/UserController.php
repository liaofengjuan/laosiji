<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\User;//使用模型
use App\Model\UserInfo;//使用模型
use Hash;//使用hash
use DB;

class UserController extends Controller
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
        $user = new User;
        // 判断where条件
        if($search_content!=''){
            switch($search_type){
                case 2://手机号
                    $user = $user->where('phone','like','%'.$search_content.'%');
                    break;
                case 3:
                    if($search_content=='是'){
                        $user = $user->where('authority',1);
                    }else{
                        $user = $user->where('authority',0);
                    }
                    break;
                default:
                    $user = $user->where('username','like','%'.$search_content.'%');
                    break;
            }
        }
        $user = $user->where('authority','!=','2');
        $data = $user->paginate(5);
        return view('admin.user.index',['data'=>$data,'request'=>$requestall]);
        // $data = User::where('authority','!=','2')->paginate(3);
        
        // return view('admin.user.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加管理员页面
        return view('admin.user.add');

    }

    /**
     * 执行添加.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取用户提交的信息
        $data1 = $request -> only("phone",'username');
        $data2 = $request -> only('email');
        //密码加密
        $password = Hash::make($request -> input('password'));
        $data1['password'] = $password;
        $data1['authority'] = 2;
        //开启事务
        DB::beginTransaction();
        //往user表里插入数据，并获取添加成功的id
        $id = User::insertGetId($data1);

        $data2['uid'] = $id;
        $res2 = UserInfo::insert($data2);
        //判断是否添加成功
        if($res2 && $id){
            DB::commit();
            return '0';
        }else{
            DB::rollBack();
            return '1';
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id',$id)->first();
        $status = $data->userinfo->status;
        return view('admin.user.edit',['data'=>$data,'status'=>$status,'id'=>$id]);
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
        $userinfo = UserInfo::where('uid',$id)->first();
        $userinfo->status = $request -> input('status');
        if($request -> input('vip')){
            $vip = $request -> input('vip');
            $vip_time = $userinfo['vip_time']-time();
            if($vip_time>0){
                $vip_time = 60*60*24*30*$vip+$vip_time+time();
            }else{
                $vip_time = 60*60*24*30*$vip+time();
            }
            $userinfo->vip_time = $vip_time; 
            $user = User::where('id',$id)->first();
            $user->authority = 1;
            $user->save();
        }
        $res = $userinfo -> save();
        if($res!=false){
            return 0;//说明成功了
        }else{
            return 1;
        }
    }

    /**
     * 执行删除管理员动作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        //开启事务
        DB::beginTransaction();
        //执行删除
        $res1 = User::where('id',$id)->delete();
        $res2 = UserInfo::where('uid',$id)->delete();
        //判断是否成功
        if($res1 && $res2){
            DB::commit();
            return 0;//删除成功
        }else{
            DB::rollBack();
            return 1;
        }
    }

    /**
     * 判断用户名是否存在
     */
    public function username(Request $request)
    {
        //获取用户信息
        $username = $request -> input('username');
        $info = User::where('username',$username)->first();
        if($info){
            echo 1;//说明该用户名已存在
        }else{
            echo 0;
        }
    }

    /**
     * 判断手机号是否存在
     */
    public function phone(Request $request)
    {
        // 获取用户信息
        $phone = $request -> input('phone');
        $data = User::where('phone',$phone)->first();
        if($data){
            echo 1;//说明该手机号已注册
        }else{
            echo 0;
        }
    }

    /**
     * 加载管理员列表
     */
    public function hander(Request $request)
    {   
        //获取搜索条件
        $search_type = $request->input('search_type');
        $search_content = $request->input('search_content');
        $requestall = $request->all();
        //实例化一个user表
        $user = new User;
        // 判断where条件
        if($search_content!=''){
            switch($search_type){
                case 2://手机号
                    $user = $user->where('phone','like','%'.$search_content.'%');
                    break;
                default:
                    $user = $user->where('username','like','%'.$search_content.'%');
                    break;
            }
        }
        $user = $user->where('authority','2');
        $data = $user->paginate(5);
        return view('admin.user.hander',['data'=>$data,'request'=>$requestall]);
        // $data = User::where('authority','2')->paginate(3);
        
        // return view('admin.user.hander',['data'=>$data]);
    }

    /**
     * 加载修改密码页面
     */
    public function pass($id)
    {
        $data = User::where('id',$id)->first();
        return view('admin.user.editPassword',['data'=>$data,'id'=>$id]);

    }

     /**
     * 加载执行修改密码页面
     */
    public function doPass(Request $request, $id)
    {
        //获取新旧密码
        $oldPass = $request -> input('oldPass');
        $newPass = $request -> input('newPass');
        //验证旧密码是否错误
        $res = User::where('id',$id)->first();
        if(!Hash::check($oldPass,$res['password']))
        {
            echo 2; //旧密码错误
            return;
        }else{
            $res = User::where('id',$id)->first();
            $res -> password = bcrypt($newPass);
            $result = $res -> save();
            //判断是否修改成功
            if($result)
            {
                //删除登录session
                $request->session()->forget('admins');
                echo 3; //修改成功
                return;
            }else{
                echo 4; //修改失败
                return;
            }
        }
    }

}
