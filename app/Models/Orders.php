<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable =['user_id','email','order_name','zip_cd','address','tel','order_content','totalPrice','status'];
}
