<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Slideshow;
use App\Model\VideoInfo;
use App\Model\VideoType;

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
        //查询分类表
        $data = VideoType::where('pid',0)->get();
        return view('admin.slideshow.add',['data'=>$data]);
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
        //通过视频id找到视频名称
        $result = VideoInfo::where('id',$data['vid'])->first();
        $data['title'] = $result['video_title'];
        $data['created_at'] = time();
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
        $res = Slideshow::where('id',$id)->delete();
        if($res){
            return 0;//删除成功
        }else{
            return 1;
        }

    }

    /**
     * 搜索指定子类中的电影
     */
    public function searchVideo($sid)
    {
        //通过sid查询子类中的电影
        $res = VideoInfo::where('tid',$sid)->get();
        if($res){
            return json_encode($res);
        }
    }
}
