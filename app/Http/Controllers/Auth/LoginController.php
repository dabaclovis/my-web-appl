<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function logination(Request $request)
    {
        $this->validate($request,[
            'email' => ['required','string'],
            'password' => ['required','string','min:8'],
        ]);
        $email = Str::lower($request->input('email'));
        $password = $request->input('password');

        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
          $request->session()->regenerate();

          if (Auth::user()->roles === 'user') {
                return redirect()->route('home');
          }else if(Auth::user()->roles === 'admin'){
            return redirect()->route('admins.index');
          }
        }
        else{
            return back();
        }
    }
}
