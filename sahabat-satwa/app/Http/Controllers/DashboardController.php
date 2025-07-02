<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\Pawrent;
use App\Models\Kunjungan;
use App\Models\DokterHewan;
use App\Models\Klinik;
use App\Models\Admin;
use App\Models\AuditLog; // Ini huruf A-nya harus besar, bukan 'app\Models\AuditLog'
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total data
        $totalAdmin = Admin::count();
        $totalPawrent = Pawrent::count();
        $totalHewan = Hewan::count();
        $totalDokter = DokterHewan::count();
        $totalKlinik = Klinik::count();

        // Data kunjungan bulan ini
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $kunjunganBulanIni = Kunjungan::whereBetween('tanggal_kunjungan', [$startOfMonth, $endOfMonth])->count();

        $kunjunganTerbaru = Kunjungan::with(['hewan', 'dokterHewan'])
            ->orderBy('tanggal_kunjungan', 'desc')
            ->take(5)
            ->get();


        $jenisHewan = Hewan::selectRaw('jenis_hewan, count(*) as total')
            ->groupBy('jenis_hewan')
            ->get();


        $logsTerbaru = AuditLog::orderBy('timestamp', 'desc')->take(5)->get();

        return view('dashboard', compact(
            'totalAdmin',
            'totalPawrent',
            'totalHewan',
            'totalDokter',
            'totalKlinik',
            'kunjunganBulanIni',
            'kunjunganTerbaru',
            'jenisHewan',
            'logsTerbaru' // Tambahkan ini
        ));
    }

    public function getKunjunganLengkap()
{

    $data = DB::table('view_kunjungan_lengkap')->get();


    return view('view.kunjunganlengkap', compact('data'));
}
}
