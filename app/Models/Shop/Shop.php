<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = "shop"; 
    protected $fillable =['name','address','address_en','tel','open_time','url'];
}
