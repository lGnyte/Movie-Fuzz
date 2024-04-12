<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function submit(Request $request)
    {

        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ], [
            'login.required' => 'Please enter your email or username.',
            'password.required' => 'Please enter your password.',
        ]);

        $loginField = $request->input('login');

        $field = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    
        $credentials = [
            $field => $loginField,
            'password' => $request->input('password'),
        ];
    
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }
    
        return back()->withErrors([
            'login' => 'Wrong email or password.',
        ]);
    }
}
