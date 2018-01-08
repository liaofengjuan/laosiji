<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    //列表页
    public function index()
    {
        //引入列表页
        return view('home.list');
    }
}
