<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\User;//使用模型
use App\Model\UserInfo;//使用模型
use Hash;//使用hash

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询数据库有没有该用户
        $data = User::paginate(3);
        
        return view('admin.user.index',['data'=>$data]);
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
        //往user表里插入数据
        $id = User::insertGetId($data1);
        if(!$id){
            echo '1';
        }

        $data2['uid'] = $id;
        $data2['authority'] = 2;
        $res2 = UserInfo::insert($data2);
        if($res2){
            echo '0';
        }else{
            echo '1';
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

}
