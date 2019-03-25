<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Model;

class IntroDiv extends Model
{
    protected $table="introdiv";
    protected $fillable = ['title','image','text'];
}
