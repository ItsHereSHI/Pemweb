<?php

namespace App\Http\Controllers;

use App\Models\NomorPegawai;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class NomorPegawaiController extends Controller
{
    public function index()
    {
        $nomorPegawai = NomorPegawai::with('pegawai')->get();
        return view('nomor_pegawai.index', compact('nomorPegawai'));
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        return view('nomor_pegawai.create', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_Pegawai' => 'required|exists:pegawai,ID_Pegawai',
            'No_Tlp' => 'required|max:20',
        ]);

        NomorPegawai::create($request->all());
        return redirect()->route('nomor_pegawai.index')->with('success', 'Nomor berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $nomor = NomorPegawai::findOrFail($id);
        $pegawai = Pegawai::all();
        return view('nomor_pegawai.edit', compact('nomor', 'pegawai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_Pegawai' => 'required|exists:pegawai,ID_Pegawai',
            'No_Tlp' => 'required|max:20',
        ]);

        $nomor = NomorPegawai::findOrFail($id);
        $nomor->update($request->all());

        return redirect()->route('nomor_pegawai.index')->with('success', 'Nomor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        NomorPegawai::findOrFail($id)->delete();
        return redirect()->route('nomor_pegawai.index')->with('success', 'Nomor berhasil dihapus.');
    }
}
