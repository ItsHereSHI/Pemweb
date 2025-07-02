<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembelianService;
use App\Models\Transaksi;
use App\Models\Pegawai;
use App\Models\Service;

class PembelianServiceController extends Controller
{
    public function index()
    {
        $data = PembelianService::with('transaksi', 'pegawai', 'service')->get();
        return view('pembelian_service.index', compact('data'));
    }

    public function create()
    {
        $transaksi = Transaksi::all();
        $pegawai = Pegawai::all();
        $service = Service::all();
        return view('pembelian_service.create', compact('transaksi', 'pegawai', 'service'));
    }

    public function store(Request $request)
    {
        PembelianService::create($request->all());
        return redirect()->route('pembelian_service.index')->with('success', 'Data Pembelian berhasil ditambahkan');

    }

    public function edit($id)
    {
        $pembelian = PembelianService::findOrFail($id);
        $transaksi = Transaksi::all();
        $pegawai = Pegawai::all();
        $service = Service::all();
        return view('pembelian_service.edit', compact('pembelian', 'transaksi', 'pegawai', 'service'));
    }

    public function update(Request $request, $id)
    {
        $pembelian = PembelianService::findOrFail($id);
        $pembelian->update($request->all());
        return redirect()->route('pembelian_service.index')->with('success', 'Data Pembelian berhasil Diperbarui');

    }

    public function destroy($id)
    {
        PembelianService::destroy($id);
        return redirect()->route('pembelian_service.index')->with('success', 'Data Pembelian Service berhasil Dihapus');

    }
}
