<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title','image','text'];
}
