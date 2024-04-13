<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function submit(LoginRequest $request)
    {
        $loginField = $request->input('login');

        $field = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    
        $credentials = [
            $field => $loginField,
            'password' => $request->input('password'),
        ];
    
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return Redirect::route('home');
        }
    
        return back()->withErrors([
            'login' => 'Wrong email or password.',
        ]);
    }
}
