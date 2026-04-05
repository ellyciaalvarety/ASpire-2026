<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Profile
    public function profile()
    {
        return view('user.profile', [
            'user' => Auth::user()
        ]);
    }

    // Update profile + foto
    public function update(Request $request)
    {
        $user = Auth::user();

        if ($request->hasFile('foto')) {

            if ($user->foto && file_exists(public_path('storage/'.$user->foto))) {
                unlink(public_path('storage/'.$user->foto));
            }

            $path = $request->file('foto')->store('users', 'public');
            $user->foto = $path;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return back()->with('success','Profile updated');
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

    if ($user->foto && file_exists(public_path('storage/'.$user->foto))) {
        unlink(public_path('storage/'.$user->foto));
    }

    $user->delete();

    return back()->with('success', 'User berhasil dihapus');
}
}