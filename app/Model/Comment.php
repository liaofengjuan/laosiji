<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comment';
    public $timestamps = false;
    protected $dateFormat = 'U';

    //一对一
    public function userinfo()
    {
        return $this->hasOne('App\Model\UserInfo','uid','uid');
    }

    //一对一
    public function user()
    {
        return $this->hasOne('App\Model\User','id','uid');
    }
}
