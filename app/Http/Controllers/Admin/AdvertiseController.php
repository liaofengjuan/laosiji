<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Advertise;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Advertise::get();
        return view ('admin/advertise/index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin/advertise/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        
        $data = $request -> except(['_token']);
        $data['created_at'] = time();
        $data['deadline'] = time()+3600*24*30*$data['deadline'];
        $res = Advertise::insert($data);
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
        $data = Advertise::where('id',$id)->first();
        return view('admin.advertise.edit',['data'=>$data]);
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
       // 接受修改的数据
        $data = $request -> except(['_token','_method','deadline']);
        $deadline = $request -> input('deadline');
        if($deadline){
            $lastTime = Advertise::where('id',$id)->first()->deadline;

            if($lastTime-time()>0){
                $data['deadline'] =3600*24*30*$deadline+$lastTime; 
            }else{
                $data['deadline'] = time()+3600*24*30*$deadline; 
            }   
        }
        $data['updated_at'] = time();
        $res = Advertise::where('id',$id)->update($data);
        if($res){
            echo 0;//成功
        }else{
            echo 1 ;
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
        $res = Advertise::where('id',$id)->delete();
        if($res){
            return 0;//删除成功
        }else{
            return 1;
        }
    }
}
