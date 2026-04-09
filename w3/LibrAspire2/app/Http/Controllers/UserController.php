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

    public function index()
    {
        $users = User::latest()->get();
        return view('superadmin.user.index', compact('users'));
    }

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

    public function destroy($id)
    {
        if (auth()->user()->role !== 'superadmin') {
            abort(403);
        }

        $user = User::findOrFail($id);

        if ($user->id == auth()->id()) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri');
        }

        // 🔥 Hapus foto pakai Storage
        if ($user->foto) {
            $localFoto = public_path($user->foto);
            $storageFoto = public_path('storage/' . $user->foto);

            if (file_exists($localFoto)) {
                unlink($localFoto);
            } elseif (file_exists($storageFoto)) {
                unlink($storageFoto);
            }
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

    public function editProfile()
    {
        $user = Auth::user();
        $view = $user->role . '.editprofile';

        return view($view, compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'old_password' => 'required_with:new_password',
            'new_password' => 'nullable|min:6|confirmed',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->filled('new_password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->withErrors(['old_password' => 'Password lama tidak cocok!']);
            }

            $user->password = Hash::make($request->new_password);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $destinationPath = 'images/profile';

            if (!file_exists(public_path($destinationPath))) {
                mkdir(public_path($destinationPath), 0755, true);
            }

            if ($user->foto) {
                $localFoto = public_path($user->foto);
                $storageFoto = public_path('storage/' . $user->foto);

                if (file_exists($localFoto)) {
                    unlink($localFoto);
                } elseif (file_exists($storageFoto)) {
                    unlink($storageFoto);
                }
            }

            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-_\.]/', '_', $foto->getClientOriginalName());
            $foto->move(public_path($destinationPath), $filename);

            $user->foto = $destinationPath . '/' . $filename;
        }

        $user->save();

        return redirect()
            ->route($user->role . '.profile')
            ->with('success', 'Profil berhasil diperbarui');
    }
}