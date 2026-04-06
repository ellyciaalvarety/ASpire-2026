<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Symfony\Component\HttpFoundation\Response;

class AnggotaMiddleware
{
   
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $role = Auth::user()->role;
        if (!in_array($role, ['anggota', 'user'])) {
            return redirect('/dashboard')->with('error', 'Akses ditolak. Anda bukan Anggota.');
        }

        return $next($request);
    }
}