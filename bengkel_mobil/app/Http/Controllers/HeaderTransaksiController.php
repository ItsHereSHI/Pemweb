<?php

namespace App\Http\Controllers;

use App\Models\HeaderTransaksi;
use App\Models\Pegawai;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class HeaderTransaksiController extends Controller
{
    public function index()
    {
        $header = HeaderTransaksi::with(['pegawai', 'transaksi'])->get();
        return view('header_transaksi.index', compact('header'));
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        $transaksi = Transaksi::all();
        return view('header_transaksi.create', compact('pegawai', 'transaksi'));
    }

    public function store(Request $request)
    {
        HeaderTransaksi::create($request->all());
        return redirect()->route('header_transaksi.index')->with('success', 'Jabatan berhasil ditambahkan');

    }

    public function edit($id)
    {
        $header = HeaderTransaksi::findOrFail($id);
        $pegawai = Pegawai::all();
        $transaksi = Transaksi::all();
        return view('header_transaksi.edit', compact('header', 'pegawai', 'transaksi'));
    }

    public function update(Request $request, $id)
    {
        $header = HeaderTransaksi::findOrFail($id);
        $header->update($request->all());
        return redirect()->route('header_transaksi.index')->with('success', 'Jabatan berhasil Diupdate');

    }

    public function destroy($id)
    {
        $header = HeaderTransaksi::findOrFail($id);
        $header->delete();
        return redirect()->route('header_transaksi.index')->with('success', 'Jabatan berhasil Dihapus');

    }
}
