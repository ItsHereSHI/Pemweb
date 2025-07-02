<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderTransaksi;
use App\Models\Jabatan;
use App\Models\NomorPegawai;
use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\PembelianService;
use App\Models\PembelianSparepart;
use App\Models\Service;
use App\Models\Sparepart;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'headerTransaksi' => HeaderTransaksi::count(),
            'jabatan' => Jabatan::count(),
            'nomorPegawai' => NomorPegawai::count(),
            'pegawai' => Pegawai::count(),
            'pelanggan' => Pelanggan::count(),
            'pembelianService' => PembelianService::count(),
            'pembelianSparepart' => PembelianSparepart::count(),
            'service' => Service::count(),
            'sparepart' => Sparepart::count(),
            'transaksi' => Transaksi::count()
        ]);
    }
}
