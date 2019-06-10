<?php

namespace App\Http\Controllers\frontend\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Share\ShopInfo;
use App\Models\Share\Calendar;
use App\Models\Share\Footer;
use App\User;
use Auth;

class ResetPasswordController extends Controller
{
    public function index(){
        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();
        $footer = Footer::find(1);

        return view('frontend.user.reset',compact('shopinfo','calendars','footer'));
    }
    public function update(Request $request){

        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('resetpassword')
                         ->with('success', 'Reset password successfully');

    }
}
