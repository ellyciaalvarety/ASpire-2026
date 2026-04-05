<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Form login
    public function loginForm()
    {
        return view('auth.login');
    }

    // Login
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email','password'))) {
            return redirect('/');
        }

        return back()->with('error','Login gagal');
    }

    // Register
    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'member'
        ]);

        return redirect('/login');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}