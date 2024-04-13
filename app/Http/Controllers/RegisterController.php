<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Services\UserService;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function submit(CreateUserRequest $request, UserService $userService)
    {
        $user = $userService->create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return Redirect::route('home');
    }
}
