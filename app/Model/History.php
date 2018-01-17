<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class History extends Model
{
    //模型属性设置
	public $table = 'history';
	public $timestamps = false;
	protected $dateFormat = 'U';
}
