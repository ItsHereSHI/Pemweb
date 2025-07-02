<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pegawai;
use Barryvdh\DomPDF\Facade\Pdf;


class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $pegawai = Pegawai::all();

        $query = Transaksi::query()->with('pelanggan', 'pegawai');

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('Tanggal_Pembelian', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        if ($request->filled('pegawai_id')) {
            $query->where('ID_Pegawai', $request->pegawai_id);
        }

        $transaksi = $query->get();

        return view('laporan.transaksi', compact('transaksi', 'pegawai'));
    }

    public function cetakPDF(Request $request)
    {
        $query = Transaksi::query()->with('pelanggan', 'pegawai');

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('Tanggal_Pembelian', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        if ($request->filled('pegawai_id')) {
            $query->where('ID_Pegawai', $request->pegawai_id);
        }

        $transaksi = $query->get();

        $pdf = PDF::loadView('laporan.transaksi_pdf', compact('transaksi'));

        return $pdf->download('laporan_transaksi.pdf');
    }
}
