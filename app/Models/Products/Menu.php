<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table="menu";
    protected $fillable =['name','image','price','description','price','type'];
}
