<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Pastikan role user adalah admin
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Anda tidak punya akses ke halaman admin.');
        }

        return $next($request);
    }
}
