<?php

namespace App\Http\Controllers\Auth;

use App\Models\SettingTitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your dashboard screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $setting_title = SettingTitle::first();

        return view('auth.login', compact('setting_title'));
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $remember = $request->has('remember');
        
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if( auth()->attempt(array('email' => $input['email'], 'password' =>$input['password']), $remember )){
            return redirect()->intended($this->redirectPath());
        }else{
            return redirect()->route('login')->with('error', 'Email and Password are wrong. Please try again!');
        }
    }

}
