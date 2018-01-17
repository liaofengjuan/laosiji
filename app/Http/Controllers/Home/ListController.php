<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Model\VideoType;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    //列表页
    public function getIndex(Request $request)
    {
        //引入列表页
        return view('home.list');
    }

    public function getTest()
    {
    	$fatherType = VideoType::where('status',0)->where('pid',0)->get();
    	echo '<pre>';
    	print_r($fatherType[0]['title']);
    }
}
