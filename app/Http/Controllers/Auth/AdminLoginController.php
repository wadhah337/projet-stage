<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // Check the password when form is submitted
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Auth::attempt() checks email + password against the users table in MySQL
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Password correct -> go to dashboard
            return redirect()->route('admin.dashboard');
        }

        // Password wrong -> go back with error message
        return back()->withErrors([
            'password' => 'Incorrect email or password.',
        ])->onlyInput('email');
        // return redirect()->route('admin.auth.login');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.auth.login');
    }
    
}
