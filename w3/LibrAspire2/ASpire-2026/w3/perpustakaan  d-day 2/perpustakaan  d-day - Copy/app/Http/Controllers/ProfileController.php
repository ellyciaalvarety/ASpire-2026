<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    
    // Admin profile edit
    public function editAdmin()
    {
        return view('admin.profil');
    }

    // Anggota profile edit
    public function editAnggota()
    {
        return view('anggota.profil');
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:6'
        ]);

        $user = Auth::user();

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui');
    }

    // Admin update wrapper 
    public function updateAdmin(Request $request)
    {
        return $this->update($request);
    }

    // Anggota update wrapper
    public function updateAnggota(Request $request)
    {
        return $this->update($request);
    }
}

