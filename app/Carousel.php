<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    //
    public $table = 'carousel';
    public $timestamps = false;
    protected $dataFormat = 'U';
}
