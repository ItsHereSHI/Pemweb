<?php

namespace App\Http\Controllers;

use App\Models\Klinik;
use Illuminate\Http\Request;

class KlinikController extends Controller
{
    public function index()
    {
        $kliniks = Klinik::all();
        return view('kliniks.index', compact('kliniks'));
    }

    public function create()
    {
        return view('kliniks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_klinik' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20'
        ]);

        Klinik::create($request->all());

        return redirect()->route('kliniks.index')
            ->with('success', 'Klinik berhasil ditambahkan');
    }

    public function show(Klinik $klinik)
    {
        return view('kliniks.show', compact('klinik'));
    }

    public function edit(Klinik $klinik)
    {
        return view('kliniks.edit', compact('klinik'));
    }

    public function update(Request $request, Klinik $klinik)
    {
        $request->validate([
            'nama_klinik' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20'
        ]);

        $klinik->update($request->all());

        return redirect()->route('kliniks.index')
            ->with('success', 'Data klinik berhasil diperbarui');
    }

    public function destroy(Klinik $klinik)
    {
        $klinik->delete();

        return redirect()->route('kliniks.index')
            ->with('success', 'Klinik berhasil dihapus');
    }
}