<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => ['required', 'string','max:255'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|string|min:8'
        ]);

        $validated ['password'] = bcrypt($validated ['password']);
        $user = User::create($validated);
        

        return redirect('/login')->with('success', 'Registration successful!');
    }
}
