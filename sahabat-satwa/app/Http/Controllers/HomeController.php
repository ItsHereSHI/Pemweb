<?php

namespace App\Http\Controllers;
use App\Models\DokterHewan;
use App\Models\Klinik;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dokterHewans = DokterHewan::with('klinik')->get();
        return view('welcome', compact('dokterHewans'));
    }
}
