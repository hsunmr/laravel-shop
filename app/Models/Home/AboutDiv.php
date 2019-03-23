<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class AboutDiv extends Model
{
    protected $table ='aboutdiv';
    protected $fillable = ['title','image','text'];
}
