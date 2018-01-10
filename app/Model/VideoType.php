<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\VideoInfo;//使用模型

class VideoType extends Model
{
   //模型属性设置
    public $table = 'video_type';
    public $timestamps = false;
    protected $dateFormat = 'U';

    public function videoinfo()
    {
    	return $this->hasMany('App\Model\VideoInfo','tid');
    }
    
}
