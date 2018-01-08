<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VideoType extends Model
{
    //
    public function videoinfo()
    {
    	return $this->hasMany('App\Model\VideoInfo','tid','pid');
    }
    
}
