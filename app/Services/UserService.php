<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Auth\Guard;

class UserService
{
    public function create($data)
    {
        return User::create($data);
    }

    public function findByUsername($username)
    {
        return User::where('username', $username)->first();
    }

    public function isOwner($user, User $userData)
    {
        return $user && $user->id === $userData->id;
    }

    public function update(User $userData, $data)
    {
        $userData->update($data);

        return $userData;
    }
}