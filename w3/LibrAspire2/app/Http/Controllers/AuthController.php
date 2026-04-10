<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ======================
    // FORM LOGIN
    // ======================
    public function loginForm(Request $request)
    {
        $request->session()->regenerateToken();

        return view('login'); // resources/views/login.blade.php
    }

    // ======================
    // LOGIN
    // ======================
    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            //  redirect sesuai role
            if ($user->role == 'member') {
                return redirect('/member');
            }

            if ($user->role == 'admin') {
                return redirect('/admin');
            }

            if ($user->role == 'superadmin') {
                return redirect('/superadmin');
            }
        }

        return back()->with('error','Email atau password salah');
    }

    // ======================
    // REGISTER
    // ======================
    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'member',
            'foto' => 'default.jpg'
        ]);

        return redirect('/login');
    }

    // ======================
    // LOGOUT
    // ======================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}