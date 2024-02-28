<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('reservation.dashboard');
        }
        return view("login");
    }

    public function attemptLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if ($this->authService->attemptLogin($email, $password)) {
            return redirect()->route('reservation.dashboard');
        } else {
            return redirect()->back()->withErrors(['login_error' => 'E-mail of wachtwoord is onjuist.']);
        }
    }


    public function signOut()
    {
        Auth::logout();
    }
}
