<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcedureController extends Controller
    {
        public function index()
        {
            return view('procedure.index');
        }
        public function ShowForm()
    {
        return view('procedure.insert_data');
    }
    public function InsertData(Request $request)
    {
        // Validasi form input
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'nama_pegawai' => 'required|string|max:100',
            'alamat_pegawai' => 'required|string|max:255',
            'username' => 'required|string|max:50',
            'password' => 'required|string|max:100',
            'id_jabatan' => 'required|integer',
            'nama_sparepart' => 'required|string|max:100',
            'stok' => 'required|integer',
            'jenis_sparepart' => 'required|string|max:50',
            'harga_sparepart' => 'required|numeric',
            'tanggal_pembelian' => 'required|date',
            'total_biaya' => 'required|numeric',
        ]);

        // Memanggil prosedur InsertData
        DB::statement('CALL InsertData(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->nama_pelanggan,
            $request->nama_pegawai,
            $request->alamat_pegawai,
            $request->username,
            $request->password,
            $request->id_jabatan,
            $request->nama_sparepart,
            $request->stok,
            $request->jenis_sparepart,
            $request->harga_sparepart,
            $request->tanggal_pembelian,
            $request->total_biaya
        ]);

        return redirect()->route('insertform')->with('success', 'Data berhasil disimpan!');
    }


    public function showHitungForm()
    {
        return view('procedure.hitung_pemasukan');
    }

    // Proses pemanggilan prosedur dan tampilkan hasil
    public function Hitung(Request $request)
    {
        $data = $request->validate([
            'id_pegawai'    => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        // Panggil stored procedure
        $result = DB::select('CALL HitungPemasukan(?, ?, ?)', [
            $data['id_pegawai'],
            $data['tanggal_mulai'],
            $data['tanggal_akhir'],
        ]);

        // Stored proc mengembalikan array of stdClass dengan property Total_Pemasukan
        $total = $result[0]->Total_Pemasukan ?? 0;

        return view('procedure.hitung_pemasukan', compact('total', 'data'));
    }

    public function detailService(Request $request)
    {
        $detail = null;
        $id_transaksi = null;

        if ($request->isMethod('post')) {
            // Jika form disubmit, ambil ID transaksi
            $id_transaksi = $request->input('id_transaksi');

            // Panggil fungsi MySQL untuk mendapatkan detail
            $detail = DB::select("SELECT GetDetailServiceByTransaksi(?) AS detail", [$id_transaksi]);

            // Ambil hasil detail
            $detail = $detail[0]->detail;
        }

        // Kirim data ke view (form dan hasil)
        return view('procedure.detail_service', compact('detail', 'id_transaksi'));
    }

}
