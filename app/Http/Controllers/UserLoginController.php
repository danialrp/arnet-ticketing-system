<?php

namespace App\Http\Controllers;

use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserLoginController extends Controller
{
    //Trait
    use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        return '/dashboard';
    }

    public function showLoginForm()
    {
        return view('user.login');
    }

    public function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|email|max:25|string',
            'password' => 'required|max:25|string',
                ]);
    }

    public function authenticated(Request $request, $user)
    {
        $user->login_time = Verta::now();

        $user->ip_address = $request->ip();

        $user->save();
    }
}
