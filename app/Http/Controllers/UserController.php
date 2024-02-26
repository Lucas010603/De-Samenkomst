<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\userService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected userService $userService;

    public function __construct()
    {
        $this->userService = new userService();
    }

    public function index()
    {
        $user = $this->userService->getAllUsers();
        return view('customer.index', ['users' => $user]);
    }

    public function new()
    {
        $user = $this->userService->getAllUsers();
        return view('customer.new', ['users' => $user]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['company' => 'required', 'email' => 'required|email', 'phone' => 'required|numeric']
        );
        $this->userService->createUser($data);
        return redirect()->route('customer');
    }

    public function edit(Customer $user)
    {
        return view('customer.edit', ['user' => $user]);
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'company' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ]);

        $this->userService->updateUser($id, $data);

        return redirect()->route('customer');
    }


    public function delete($id, Request $request)
    {
        $user = $this->userService->deleteUser($id);

        return redirect()->route('customer');
    }
}
