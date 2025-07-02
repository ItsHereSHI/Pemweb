<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    // Menampilkan daftar jabatan
    public function index()
    {
        $jabatans = Jabatan::all(); // Ambil semua data jabatan
        return view('jabatan.index', compact('jabatans'));
    }

    // Menampilkan form untuk membuat jabatan baru
    public function create()
    {
        return view('jabatan.create');
    }

    // Menyimpan jabatan baru
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Jabatan' => 'required|string|max:50',
            'Gaji' => 'required|numeric',
        ]);

        Jabatan::create($request->all()); // Simpan data jabatan
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit jabatan
    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('jabatan.edit', compact('jabatan'));
    }

    // Menyimpan perubahan jabatan
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama_Jabatan' => 'required|string|max:50',
            'Gaji' => 'required|numeric',
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($request->all()); // Update data jabatan
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil diperbarui');
    }

    // Menghapus jabatan
    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete(); // Hapus jabatan
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil dihapus');
    }
}
