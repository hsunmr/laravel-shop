<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $table ='carousel';
    protected $fillable = ['name','image_name'];
}
