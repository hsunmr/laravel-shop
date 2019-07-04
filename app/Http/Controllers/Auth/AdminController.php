<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   
    public function showLoginForm(){
        return view('backend.login');
    }
    public function username()
    {
        return 'username';
    }
    protected $redirectTo ='/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('guest:admin')->except('logout');
    }

    public function login(Request $request){
        //Validate the form data
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        //Attempt to log the user in

        if(Auth::guard('admin')->attempt(['username'=>$request->username,'password'=>$request->password])){
            //if successful, then redirect to their intended location
            return redirect()->intended(route('dashboard'));
        }

        //if unsuccessful, then redirect back to the login page 
        return $this->sendFailedLoginResponse($request);
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
        
        return $this->loggedOut($request) ?: redirect('/admin');
    }
}
