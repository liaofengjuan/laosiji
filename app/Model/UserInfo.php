<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //模型属性设置
    public $table = 'user_info';
    public $timestamps = false;
    protected $dateFormat = 'U';
}
