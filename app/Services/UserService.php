<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Reservation;
use App\Models\User;
use App\Models\UserRole;

class userService
{
    public function getAll()
    {
        return User::where('active', 1)->get();
    }

    public function getAllRoles()
    {
        return UserRole::where('active',1)->get();
    }

    public function create($data)
    {
        return User::insert($data);
    }

    public function update($id, $data)
    {
        $user = User::find($id);
      return  $user->update($data);

    }

    public function store($data)
    {
        return User::insert($data);
    }

    public function delete($id)
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