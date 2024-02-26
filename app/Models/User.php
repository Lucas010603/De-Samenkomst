<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class User extends AuthenticatableUser implements Authenticatable

{
    protected $guarded = [];
    protected $table = "user";

    public function role()
    {
        return $this->hasOne(UserRole::class, "id", "role_id");
    }
}
