<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return view('obats.index', compact('obats'));
    }

    public function create()
    {
        return view('obats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'petunjuk_penggunaan' => 'required|string'
        ]);

        Obat::create($request->all());

        return redirect()->route('obats.index')
            ->with('success', 'Obat berhasil ditambahkan');
    }

    public function show(Obat $obat)
    {
        return view('obats.show', compact('obat'));
    }

    public function edit(Obat $obat)
    {
        return view('obats.edit', compact('obat'));
    }

    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'petunjuk_penggunaan' => 'required|string'
        ]);

        $obat->update($request->all());

        return redirect()->route('obats.index')
            ->with('success', 'Data obat berhasil diperbarui');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect()->route('obats.index')
            ->with('success', 'Obat berhasil dihapus');
    }
}