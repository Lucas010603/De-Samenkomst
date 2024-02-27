<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    protected UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        $user = $this->userService->getAll();

        return view('user.index', ['users' => $user]);
    }

    public function new()
    {
        $user = $this->userService->getAll();
        $roles = $this->userService->getAllRoles();
        return view('user.new', ['users' => $user, 'roles' => $roles]);
    }



    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|confirmed',
            'role_id' => 'required'
        ]);


        if ($request->has('password')) {
            $data['password'] = Hash::make($data['password']);
            unset($data['password_confirmation']);
        }

        $this->userService->store($data);
        return redirect()->route('user');
    }



    public function edit($id)
    {
        $user = User::find($id);
        $roles = $this->userService->getAllRoles();
        return view('user.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([

            'email' => 'required|email',
            'name' => 'required',
            'role_id' => 'required'

        ]);

        $this->userService->update($id, $data);

        return redirect()->route('user');
    }


    public function delete($id)
    {
        return response()->json($this->userService->delete($id));
    }
}
