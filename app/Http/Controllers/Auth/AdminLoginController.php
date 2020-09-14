<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (\Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))  {
           return redirect()->intended(route('admin.dashboard'));
        }
        else {

        return redirect()->back()->withErrors(['msg'=> 'Wrong email or password'])->withInput($request->only('email', 'remember'));
        }

        // Attempt to log the user in;

        //IF succ

    }
    public function logout()
    {
        \Auth::guard('admin')->logout();

        return redirect('/');
    }
}
