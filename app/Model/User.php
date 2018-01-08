<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //设置表名
    public $table = 'user';
	//关闭时间戳
	public $timestamps = false;
}
