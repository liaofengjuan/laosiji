<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\VideoType;//使用模型


class VideoTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询数据
        $data = VideoType::where('pid','0')->get();
        return view('admin.videoType.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videoType.addFather');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取添加的信息
        $data = $request->only('title','status');
        //添加path信息
        $data['pid'] = 0;
        $data['path'] = 0;
        //执行添加
        $res = VideoType::insert($data);
        if($res){
            return 0;//添加成功
        }else{
            return 1;//失败
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
        //通过父类的id查看该类下有多少子类
        $data = VideoType::where('pid',$id) -> get();
        $data = json_encode($data);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //查询该类的信息
        $data = VideoType::where('id',$id)->first();
        //加载修改页面
        return view('admin.videoType.edit',['data'=>$data]);

    }

    /**
     * 执行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //获取要修改的信息
        $data = $request->only('status','title');
        //执行修改
        $type = VideoType::find($id);
        $type->status = $data['status'];
        $type->title = $data['title'];
        $res = $type->save();
        if($res){
            return 0;//修改成功
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
        //判断该类有没有子类
        $type = VideoType::find($id);
        //若删除的类别是主类，判断是否还有子类
        if($type['pid']==0){
            $res = VideoType::where('pid',$id)->get();
            if(count($res)>0){
                return '1';
            }

        }
        $res = VideoType::find($id)->delete();
        if($res){
            return "0";
        }else{
            return "2";
        }
        //$flight = App\Flight::find(1);

        // $flight->delete();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addSon($id)
    {
        //查询父类第信息
        $data = VideoType::find($id);
        return view('admin.videoType.addSon',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSon(Request $request,$id)
    {
        //获取用户提交的信息
        $data = $request->only('title','status');
        //将pid和path存入数组
        $data['pid'] = $id;
        $data['path'] = '0-'.$id;
        //执行添加
        $res = VideoType::insert($data);
        if($res){
            return 0;//添加成功
        }else{
            return 1;//添加失败
        }
    }
}
