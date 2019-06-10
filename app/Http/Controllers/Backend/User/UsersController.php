<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(6);
        return view('backend.user.users',compact('users'));
    }
}
