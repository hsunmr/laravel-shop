<?php

namespace App\Models\Share;

use Illuminate\Database\Eloquent\Model;

class ShopInfo extends Model
{
    protected $table = "shopinfo";
    protected $fillable =['title','address','tel','mail','businesshours','offday','image'];
}
