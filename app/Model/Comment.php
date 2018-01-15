<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comment';
    public $timestamps = false;
    protected $dateFormat = 'U';
}
