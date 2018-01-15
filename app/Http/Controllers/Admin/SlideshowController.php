<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Slideshow;
use App\Model\VideoInfo;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slideshow::get();
        return view('admin.slideshow.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slideshow.add');
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
        //通过title查找视频表中的电影的id，确定vid
        $res = VideoInfo::where('video_title',$data['title'])->first();
        $data['vid'] = $res['id'];
        $data['create_at'] = time();
        $res = Slideshow::insert($data);
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
        $res = Slideshow::where('id',$id)->first();
        return view('admin.slideshow.edit',['res'=>$res]);
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
        $status = $request->input('status');
        $updated_at = time();
        $res = Slideshow::where('id',$id)->update(['status'=>$status,'updated_at'=>$updated_at]);
        if($res){
            return 0;//成功
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
        $res = VideoInfo::where('id',$id)->delete();
        if($res){
            return 0;//删除成功
        }else{
            return 1;
        }
    }
}
