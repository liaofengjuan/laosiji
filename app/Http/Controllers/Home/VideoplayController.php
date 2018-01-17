<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\VideoInfo;

class VideoplayController extends Controller
{
   public function getIndex($play_id)
   {
   		$res = VideoInfo::where('id',$play_id)->first();
        return view('home.video.videoplay',['data' => $res]);
   }
}
