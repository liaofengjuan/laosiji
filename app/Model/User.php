<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\UserInfo;//使用模型

class User extends Model
{
    //模型属性设置
    public $table = 'user';
    public $timestamps = false;
    protected $dateFormat = 'U';

    //一对一
    public function userinfo()
    {
        return $this->hasOne('App\Model\UserInfo','uid');
    }
}
