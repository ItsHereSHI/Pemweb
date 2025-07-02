<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sparepart;

class SparepartController extends Controller
{
    public function index()
    {
        $data = Sparepart::all();
        return view('sparepart.index', compact('data'));
    }

    public function create()
    {
        return view('sparepart.create');
    }

    public function store(Request $request)
    {
        // Menyimpan data sparepart
        Sparepart::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('sparepart.index')->with('success', 'Sparepart berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        return view('sparepart.edit', compact('sparepart'));
    }

    public function update(Request $request, $id)
    {
        $sparepart = Sparepart::findOrFail($id);
        $sparepart->update($request->all());
        return redirect()->route('sparepart.index')->with('success', 'Sparepart berhasil Diupdate!');
    }

    public function destroy($id)
    {
        Sparepart::destroy($id);
        return redirect()->route('sparepart.index')->with('success', 'Sparepart berhasil Dihapus');
    }
}
