<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Config;
class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = config::first();
         return view('admin.config.index',['res'=>$res]);
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
        // echo 'store';
        $res = $request->all();
        // dd($_FILES);
        // dd($res);
        $jieguo = config::first();
        $jieguo->webname = $res['webname'];
        $jieguo->keywords = $res['keywords'];
        $jieguo->description = $res['description'];
        $jieguo->copyright = $res['copyright'];
        $jieguo->status = $res['status'];
        $jieguo->logo = $res['logo'];
        //执行修改
        $final = $jieguo->save();
        if($final){
            echo "<script>alert('恭喜，修改成功！');location.href='/admin/config'</script>";
        }else{
            echo "<script>alert('抱歉，修改失败！');location.href='/admin/config'</script>";

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
        echo 'edit';
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
        echo 'update';
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
