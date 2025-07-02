<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // Ganti dengan path view yang sesuai
    }

    // Menangani login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek kredensial di tabel admin dan members
        $member = Member::where('username', $request->username)->first();
        $admin = Admin::where('username', $request->username)->first();

        if ($member && Hash::check($request->password, $member->password)) {
            session(['member' => $member]);
            return redirect()->route('member.dashboard');
        }

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin' => $admin]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    // Menampilkan form pendaftaran
    public function showRegisterForm()
    {
        return view('auth.register'); // Ganti dengan path view yang sesuai
    }

    // Menangani pendaftaran
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:members',
            'password' => 'required|string|min:8|confirmed', // Memastikan ada konfirmasi password
        ]);

        // Membuat member baru
        Member::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Menghash password
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    // Menangani logout
    public function logout()
    {
        session()->forget('member');
        session()->forget('admin');
        return redirect()->route('login');
    }
}
