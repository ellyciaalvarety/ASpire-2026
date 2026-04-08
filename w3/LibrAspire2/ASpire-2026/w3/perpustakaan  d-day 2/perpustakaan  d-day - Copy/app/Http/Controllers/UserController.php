<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'anggota')->get();
        return view('admin.user.index', compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'nama_lengkap' => 'required',
            'password' => 'required|min:6',
        ]);

        User::create([
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'password' => Hash::make($request->password),
            'role' => 'anggota',
        ]);

        return redirect('/admin/user')->with('success', 'Anggota berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required',
            'nama_lengkap' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'password' => $request->password
                ? Hash::make($request->password)
                : $user->password
        ]);

        return redirect('/admin/user')->with('success', 'Anggota berhasil diperbarui');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/admin/user')->with('success', 'Anggota berhasil dihapus');
    }
}
