<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $fillable =['name','image','price','description','price','type'];
}
