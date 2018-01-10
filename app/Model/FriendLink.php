<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FriendLink extends Model
{
    //模型属性设置
    public $table = 'friend_link';
    protected $dateFormat = 'U';
}
