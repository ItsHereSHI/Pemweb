<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Kunjungan;
use App\Models\Obat;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function index()
    {
        $reseps = Resep::with(['kunjungan', 'obat'])->get();
        return view('reseps.index', compact('reseps'));
    }

    public function create()
    {
        $kunjungans = Kunjungan::all();
        $obats = Obat::all();
        return view('reseps.create', compact('kunjungans', 'obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kunjungan' => 'required|exists:kunjungan,id_kunjungan',
            'id_obat' => 'required|exists:obat,id_obat',
            'dosis' => 'required|string|max:50',
            'frekuensi' => 'required|string|max:50'
        ]);

        Resep::create($request->all());

        return redirect()->route('reseps.index')
            ->with('success', 'Resep berhasil ditambahkan');
    }

    public function show(Resep $resep)
    {
        return view('reseps.show', compact('resep'));
    }

    public function edit(Resep $resep)
    {
        $kunjungans = Kunjungan::all();
        $obats = Obat::all();
        return view('reseps.edit', compact('resep', 'kunjungans', 'obats'));
    }

    public function update(Request $request, Resep $resep)
    {
        $request->validate([
            'id_kunjungan' => 'required|exists:kunjungan,id_kunjungan',
            'id_obat' => 'required|exists:obat,id_obat',
            'dosis' => 'required|string|max:50',
            'frekuensi' => 'required|string|max:50'
        ]);

        $resep->update($request->all());

        return redirect()->route('reseps.index')
            ->with('success', 'Data resep berhasil diperbarui');
    }

    public function destroy(Resep $resep)
    {
        $resep->delete();

        return redirect()->route('reseps.index')
            ->with('success', 'Resep berhasil dihapus');
    }
}