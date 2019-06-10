<?php

namespace App\Http\Controllers\frontend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Share\ShopInfo;
use App\Models\Share\Calendar;
use App\Models\Share\Footer;
use App\User;
use Auth;

class ProfileController extends Controller
{
    public function index(){
        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();
        $footer = Footer::find(1);

        return view('frontend.user.profile',compact('shopinfo','calendars','footer'));
    }
    public function update(Request $request){

        $request->validate([
            'gender' => ['nullable', 'string', 'max:255'],
            'birthday' => ['nullable','date', 'string', 'max:255'],
            'zip_cd' => ['required', 'numeric','digits_between:3,5'],
            'city' => ['nullable', 'alpha','string', 'max:255'],
            'addr1' => ['nullable', 'alpha_dash','string', 'max:255'],
            'addr2' => ['nullable', 'alpha_dash','string', 'max:255'],
            'tel' => ['required', 'numeric', 'digits_between:6,11'],
        ]);

        $user = User::find(Auth::user()->id);
        $user->gender = $request->input('gender');
        $user->birthday = $request->input('birthday');
        $user->zip_cd = $request->input('zip_cd');
        $user->city = $request->input('city');
        $user->addr1 = $request->input('addr1');
        $user->addr2 = $request->input('addr2');
        $user->tel = $request->input('tel');
        
        $user->save();
        return redirect()->route('profile')
                         ->with('success', 'Update profile successfully');

    }
}
