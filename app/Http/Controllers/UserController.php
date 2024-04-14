<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index($username, UserService $userService)
    {
        $userData = $userService->findByUsername($username);

        if (!$userData) {
            abort(404);
        }

        $isOwner = $userService->isOwner(auth()->user(), $userData);

        return view('user.profile', [
            'username' => $username,
            'userData' => $userData,
            'isOwner' => $isOwner,
        ]);
    }

    public function edit($username, UserService $userService)
    {
        $userData = $userService->findByUsername($username);

        if (!$userData) {
            abort(404);
        }

        return view('user.profile-edit', [
            'username' => $username,
            'userData' => $userData,
        ]);
    }

    public function update(UpdateUserRequest $request, $username, UserService $userService)
    {
        $userData = $userService->findByUsername($username);

        if (!$userData) {
            abort(404);
        }

        //if no fields are changed, return with a message
        $data = array();
        if ($request->name != $userData->name) {
            $data['name'] = $request->name;
        }
        if ($request->username != $userData->username) {
            $data['username'] = $request->username;
        }

        if (empty($data)) {
            return redirect()->route('user-profile.edit', ['username' => $request->username])
                ->with('info', 'No changes were made.');
        }

        $userData = $userService->update($userData, $data);

        return redirect()->route('user-profile.show', ['username' => $request->username])
            ->with('success', 'Profile updated.');
    }
}
