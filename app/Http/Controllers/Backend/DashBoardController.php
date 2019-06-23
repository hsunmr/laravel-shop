<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;

class DashBoardController extends Controller
{
    public function index(){
        $ordersCount = Orders::all()->count();

        return view('backend.index',compact('ordersCount'));
    }
}
