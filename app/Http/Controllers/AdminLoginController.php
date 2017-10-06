<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //Where to redirect seller after login.
    protected $redirectTo = '/admin/dashboard';

    //Trait
    use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('admin_guest')->except('logout');
    }

    //Custom guard for admins
    protected function guard()
    {
        return Auth::guard('web_admin');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|email|max:25|string',
            'password' => 'required|max:25|string',
        ]);
    }

    public function logout(Request $request)
    {
        $this->guard('web_admin')->logout();

        $request->session()->invalidate();

        return redirect('/admin/login');
    }
}
