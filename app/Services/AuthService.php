<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Attempt to log in the user.
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function attemptLogin($email, $password)
    {
        return Auth::attempt(['email' => $email, 'password' => $password,'active' => 1]);
    }
}
