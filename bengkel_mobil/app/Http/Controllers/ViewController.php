<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    public function index()
    {
        return view('view.index');
    }
    public function view1()
    {
        $pemasukan = DB::select('SELECT * FROM view_pemasukan_service_pegawai');


        return view('view.view1', compact('pemasukan'));
}

public function view2()
{
    $spareparts = DB::table('view_sparepart_terbanyak')->get();
    return view('view.view2', compact('spareparts'));
}

public function view3()
{
    $transaksi = DB::table('view_transaksi_by_pelanggan')->get();
    return view('view.view3', compact('transaksi'));
}
}
