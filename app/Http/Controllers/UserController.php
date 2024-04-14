<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class UserController extends Controller
{
    public function index($username, UserService $userService)
    {
        $userData = $userService->findByUsername($username);

        if (!$userData) {
            abort(404);
        }

        $isOwner = $userService->isOwner(auth()->user(), $userData);

        return view('user-profile', [
            'username' => $username,
            'userData' => $userData,
            'isOwner' => $isOwner,
        ]);
    }
}
