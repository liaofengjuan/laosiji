<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Comment;//使用模型

class VideoInfo extends Model
{
	//模型属性设置
    public $table = 'video_info';
    public $timestamps = false;
    protected $dateFormat = 'U';

    
    public function comment()
    {
    	return $this->hasMany('App\Model\Comment','vid');
    }

    //一对一
    public function slideshow()
    {
        return $this->hasOne('App\Model\Slideshow','vid');
    }

    //一对一
    public function user()
    {
        return $this->hasOne('App\Model\User','id','uid');
    }

     //一对一
    public function userinfo()
    {
        return $this->hasOne('App\Model\UserInfo','uid','uid');
    }
}
