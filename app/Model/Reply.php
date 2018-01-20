<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    public $table = 'reply';
    public $timestamps = false;
    protected $dateFormat = 'U';

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
