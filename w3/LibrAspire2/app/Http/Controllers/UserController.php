<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SUPERADMIN
    |--------------------------------------------------------------------------
    */

    // List semua user
    public function index()
    {
        $users = User::latest()->get();
        return view('superadmin.user.index', compact('users'));
    }

    // Update role saja
    public function updateRole(Request $request, $id)
    {
        if (auth()->user()->role !== 'superadmin') {
            abort(403);
        }

        $request->validate([
            'role' => 'required|in:admin,member,superadmin'
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'role' => $request->role
        ]);

        return back()->with('success', 'Role berhasil diupdate');
    }

    // Hapus user
    public function destroy($id)
    {
        if (auth()->user()->role !== 'superadmin') {
            abort(403);
        }

        $user = User::findOrFail($id);

        // tidak boleh hapus diri sendiri
        if ($user->id == auth()->id()) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri');
        }

        if ($user->foto && file_exists(public_path('storage/'.$user->foto))) {
            unlink(public_path('storage/'.$user->foto));
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus');
    }


    /*
    |--------------------------------------------------------------------------
    | USER (PROFILE)
    |--------------------------------------------------------------------------
    */

    public function profile()
    {
        $user = Auth::user();

        // Tentukan view berdasarkan role
        switch ($user->role) {
            case 'superadmin':
                $view = 'superadmin.profile';
                break;
            case 'admin':
                $view = 'admin.profile';
                break;
            default:
                $view = 'member.profile';
                break;
        }

        return view($view, compact('user'));
    }

    // Menampilkan form edit dengan data user saat ini
    public function editProfile()
    {
        $user = Auth::user();
        
        // Mengarahkan ke view sesuai role
        $view = $user->role . '.editprofile'; 
        return view($view, compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'old_password' => 'required_with:new_password', // Password lama wajib diisi jika mau ganti password
            'new_password' => 'nullable|min:6|confirmed',  // 'confirmed' butuh input bernama new_password_confirmation
            'foto'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Cek Password Lama jika user mengisi password baru
        if ($request->filled('new_password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->withErrors(['old_password' => 'Password lama tidak cocok!']);
            }
            $user->password = Hash::make($request->new_password);
        }

        // Update Nama & Email
        $user->name = $request->name;
        $user->email = $request->email;

        // Proses Upload Foto
        if ($request->hasFile('foto')) {
            if ($user->foto && file_exists(public_path('storage/' . $user->foto))) {
                unlink(public_path('storage/' . $user->foto));
            }
            $user->foto = $request->file('foto')->store('users', 'public');
        }

        $user->save();
        return redirect()->route(auth()->user()->role . '.profile')->with('success', 'Profil berhasil diperbarui');
        }
}