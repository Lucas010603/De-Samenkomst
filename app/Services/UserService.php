<?php

namespace App\Services;

use App\Models\User;

class userService
{
    public function getAllUsers()
    {

        return User::all();
    }

    public function createUser($data)
    {
        return User::insert($data);
    }

    public function updateUser($id, $data)
    {
        $user = User::find($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user && $user->active == 1) {
            $user->update(['active' => 0]);
            return true;
        } else {
            return false;
        }
    }
}