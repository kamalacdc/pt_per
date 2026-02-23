<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admins.index', compact('admins'));
    }

    public function confirmCreate()
    {
        return view('admin.admins.confirm_create');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'master_password' => 'required|string',
        ]);

        $masterPassword = Setting::getValue('master_password');

        if (!$masterPassword || !Hash::check($request->master_password, $masterPassword)) {
            return redirect()->back()->withErrors(['master_password' => 'Password master salah.']);
        }

        // Store confirmation in session
        session(['admin_create_confirmed' => true]);

        return redirect()->route('admin.admins.create');
    }

    public function create()
    {
        // Check if confirmation was done
        if (!session('admin_create_confirmed')) {
            return redirect()->route('admin.admins.confirm');
        }

        // Clear the confirmation
        session()->forget('admin_create_confirmed');

        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.admins.index')->with('success', 'Admin berhasil dibuat.');
    }
}
