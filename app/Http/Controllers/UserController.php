<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            "password" => 'required',
        ]);

        if ($validation->fails())
            return response(['status' => 'warning', 'message' => implode('<br>', $validation->errors()->all())]);

        $this->user->create([
            'name'         => ucwords(trim($request->name)),
            'email'        => trim($request->email),
            'password'     => Hash::make(trim($request->password))
        ]);

        return redirect('/register')->with('success', "Successfully registered.");
    }
}