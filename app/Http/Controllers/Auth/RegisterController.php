<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name_last' => ['required', 'string', 'max:255'],
            'name_first' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'birthday_year' => ['required', 'string', 'max:255'],
            'birthday_month' => ['required', 'string', 'max:255'],
            'birthday_day' => ['required', 'string', 'max:255'],
            'ZIP_CD' => ['required', 'string', 'max:255'],
            'CITY' => ['required', 'string', 'max:255'],
            'ADDR1' => ['required', 'string', 'max:255'],
            'ADDR2' => ['required', 'string', 'max:255'],
            'TEL' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      
        return User::create([
            'name_last' => $data['name_last'],
            'name_first' => $data['name_first'],
            'gender' => $data['gender'],
            'birthday' => $data['birthday_year'] . '/' .  $data['birthday_month'] . '/' . $data['birthday_day'] ,
            'ZIP_CD' => $data['ZIP_CD'],
            'CITY' => $data['CITY'],
            'ADDR1' => $data['ADDR1'],
            'ADDR2' => $data['ADDR2'],
            'TEL' => $data['TEL'],
            'type' => '0',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
