<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //no-Captcha
//    public function validateLogin(Request $request)
//    {
//        $this->validate( $request , [
//            'email' => ['required', 'string', 'email' ],
//            'password' => ['required', 'string' ],
//            'g-recaptcha-response' => 'required|captcha'
//        ]   );
//    }

}
