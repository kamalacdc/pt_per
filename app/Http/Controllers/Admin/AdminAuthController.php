<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

   public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (auth()->guard('admin')->attempt($credentials)) {
        $request->session()->regenerate(); // penting biar session fix
        return redirect()->intended(route('admin.dashboard'))
            ->with('success', 'Selamat datang di dashboard admin!');
    }

    return back()->withInput()->with('error', 'Email atau password salah.');
}


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }
}
