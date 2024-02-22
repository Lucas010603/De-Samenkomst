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

        if (empty($email) || empty($password)) {
            return redirect()->back()->with('error', 'Please provide both email and password');
        }

        if ($this->authService->attemptLogin($email, $password)) {
            return redirect()->route('reservation.dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function signOut()
    {
        Auth::logout();
    }
}
