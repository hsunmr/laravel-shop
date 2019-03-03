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
            'name_last' => ['required','alpha', 'string', 'max:255'],
            'name_first' => ['required','alpha', 'string', 'max:255'],
            'gender' => ['nullable', 'string', 'max:255'],
            'birthday' => ['nullable','date', 'string', 'max:255'],
            'zip_cd' => ['required', 'numeric','digits_between:3,5'],
            'city' => ['nullable', 'alpha','string', 'max:255'],
            'addr1' => ['nullable', 'alpha_dash','string', 'max:255'],
            'addr2' => ['nullable', 'alpha_dash','string', 'max:255'],
            'tel' => ['required', 'numeric', 'digits_between:6,11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ],$messages = [
           
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
            'birthday' => $data['birthday'],
            'zip_cd' => $data['zip_cd'],
            'city' => $data['city'],
            'addr1' => $data['addr1'],
            'addr2' => $data['addr2'],
            'tel' => $data['tel'],
            'type' => '0',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
