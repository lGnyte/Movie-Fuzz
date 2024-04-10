<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;


class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'terms' => 'accepted',
        ], [
            'terms.accepted' => 'You must agree to the terms.',
            'name.required' => 'Please enter your name.',
            'name.min' => 'The name must be at least 4 characters long.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.min' => 'The password must be at least 8 characters long.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return Redirect::route('home');
    }
}
