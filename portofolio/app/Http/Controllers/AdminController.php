<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan dashboard admin
    public function index()
    {
        // Cek apakah admin sedang login
        if (!session()->has('admin')) {
            return redirect()->route('login'); // Redirect ke halaman login jika tidak ada session
        }

        return view('Admin.dashboard'); // Ganti dengan path view yang sesuai
    }
}
