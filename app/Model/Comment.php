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

    //一对一
    public function videoinfo()
    {
        return $this->hasOne('App\Model\VideoInfo','id','vid');
    }

    //一对多
    public function reply()
    {
        return $this->hasMany('App\Model\Reply','comment_id');
    }
}
