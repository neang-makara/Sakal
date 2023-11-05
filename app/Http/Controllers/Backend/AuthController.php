<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request) {
        return view('backend.auth.login');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function validateForm(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Session::has('locked')) {
            return back()->withErrors(['failed' => 'Many logins attempt please wait 10s']);
        }
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], false)) {

            if (Auth::user()->disabled) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'failed' => 'The user had been blocked!'
                ]);
            }

            return redirect()->route('dashboard');
        }
        Session::put('login_attempts', Session::get('login_attempts', 0) + 1);
        Session::put('error-login', 'login fail');
        if (Session::get('login_attempts', 0) > 2) {
            Session::put('locked', time());
            return back()->withErrors(['failed' => 'Many logins attempt please wait 10s']);
        }
        return back()->withErrors([
            'failed' => 'Invalid username or password'
        ]);
    }
}
