<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "producttype";
    protected $fillable =['name','type','order'];
}
