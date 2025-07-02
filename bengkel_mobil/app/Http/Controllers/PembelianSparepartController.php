<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembelianSparepart;
use App\Models\Transaksi;
use App\Models\Sparepart;

class PembelianSparepartController extends Controller
{
    public function index()
    {
        $data = PembelianSparepart::all();
        return view('pembelian_sparepart.index', compact('data'));
    }

    public function create()
    {
        $transaksi = Transaksi::all();
        $sparepart = Sparepart::all();
        return view('pembelian_sparepart.create', compact('transaksi', 'sparepart'));
    }

    public function store(Request $request)
    {
        PembelianSparepart::create($request->all());
        return redirect()->route('pembelian_sparepart.index')->with('success', 'Sparepart berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pembelianSparepart = PembelianSparepart::findOrFail($id);
        $transaksi = Transaksi::all();
        $sparepart = Sparepart::all();
        return view('pembelian_sparepart.edit', compact('pembelianSparepart', 'transaksi', 'sparepart'));
    }

    public function update(Request $request, $id)
    {
        $pembelianSparepart = PembelianSparepart::findOrFail($id);
        $pembelianSparepart->update($request->all());
        return redirect()->route('pembelian_sparepart.index')->with('success', 'Sparepart berhasil Diupdate');
    }

    public function destroy($id)
    {
        PembelianSparepart::destroy($id);
        return redirect()->route('sparepart.index')->with('success', 'Sparepart berhasil Dihapus');
    }
}
