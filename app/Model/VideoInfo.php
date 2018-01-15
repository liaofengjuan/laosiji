<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\VideoType;//使用模型

class VideoInfo extends Model
{
	//模型属性设置
    public $table = 'video_info';
    public $timestamps = false;
    protected $dateFormat = 'U';

    


}
