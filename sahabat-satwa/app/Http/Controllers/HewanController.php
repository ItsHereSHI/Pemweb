<?php
// app/Http/Controllers/HewanController.php

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\Pawrent;
use Illuminate\Http\Request;

class HewanController extends Controller
{
    public function index()
    {
        $hewans = Hewan::with('pawrent')->get();
        return view('hewans.index', compact('hewans'));
    }

    public function create()
    {
        $pawrents = Pawrent::all();
        return view('hewans.create', compact('pawrents'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_hewan' => 'required|string|max:255',
            'tahun_lahir' => 'required|date',
            'jenis_hewan' => 'required|string|max:100',
            'id_pawrent' => 'required|exists:pawrent,id_pawrent'
        ]);

        // Menyimpan data ke tabel hewan
        Hewan::create([
            'nama_hewan' => $request->nama_hewan,
            'tahun_lahir' => $request->tahun_lahir,
            'jenis_hewan' => $request->jenis_hewan,
            'id_pawrent' => $request->id_pawrent,
        ]);

        return redirect()->route('hewans.index')
            ->with('success', 'Hewan berhasil ditambahkan');
    }

    public function show(Hewan $hewan)
    {
        return view('hewans.show', compact('hewan'));
    }

    public function edit(Hewan $hewan)
    {
        $pawrents = Pawrent::all();
        return view('hewans.edit', compact('hewan', 'pawrents'));
    }

    public function update(Request $request, Hewan $hewan)
    {
        // Validasi input
        $request->validate([
            'nama_hewan' => 'required|string|max:255',
            'tahun_lahir' => 'required|date',
            'jenis_hewan' => 'required|string|max:100',
            'id_pawrent' => 'required|exists:pawrent,id_pawrent'
        ]);

        // Update data di tabel hewan
        $hewan->update([
            'nama_hewan' => $request->nama_hewan,
            'tahun_lahir' => $request->tahun_lahir,
            'jenis_hewan' => $request->jenis_hewan,
            'id_pawrent' => $request->id_pawrent,
        ]);

        return redirect()->route('hewans.index')
            ->with('success', 'Data hewan berhasil diperbarui');
    }

    public function destroy(Hewan $hewan)
    {
        // Hapus data
        $hewan->delete();

        return redirect()->route('hewans.index')
            ->with('success', 'Hewan berhasil dihapus');
    }
}
