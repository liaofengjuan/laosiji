<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Model\FriendLink;//使用模型

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * 执行上传文件
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadImg(Request $request)
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
            'message' => '恭喜上传成功'
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //加载添加页面
        return view('admin.friend.add');
    }

    /**
     * 执行添加有友情链接
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> except(['_token','pic']);
        $res = FriendLink::insert($data);
        // return 12;
        if($res){
            return 0;//成功
        }else{
            return 1;
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

    
}
