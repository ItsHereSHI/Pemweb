<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    // Menampilkan dashboard member
    public function index()
    {
        // Cek apakah member sedang login
        if (!session()->has('member')) {
            return redirect()->route('login'); // Redirect ke halaman login jika tidak ada session
        }

        return view('Member.dashboard'); // Ganti dengan path view yang sesuai
    }
}
