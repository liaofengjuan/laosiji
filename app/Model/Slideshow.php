<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    public $table = 'slideshow';
    public $timestamps = false;
    protected $dateFormat = 'U';
    
}
