<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

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

    public function showForgotPassword()
    {
        return view('admin.auth.forgot_password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return back()->with('error', 'Email tidak ditemukan.');
        }

        // Generate token
        $token = Str::random(60);

        // Store token in password_resets table
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => Hash::make($token), 'created_at' => now()]
        );

        // Send email
        Mail::to($request->email)->send(new ResetPasswordMail($token));

        return back()->with('success', 'Link reset password telah dikirim ke email Anda.');
    }

    public function showResetPassword($token)
    {
        return view('admin.auth.reset_password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $reset = DB::table('password_resets')->where('email', $request->email)->first();

        if (!$reset || !Hash::check($request->token, $reset->token)) {
            return back()->with('error', 'Token reset tidak valid.');
        }

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return back()->with('error', 'Email tidak ditemukan.');
        }

        $admin->password = Hash::make($request->password);
        $admin->save();

        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('admin.login')->with('success', 'Password berhasil direset. Silakan login.');
    }
}
