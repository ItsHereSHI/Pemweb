<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Hewan;
use App\Models\DokterHewan;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    public function index()
    {
        $kunjungans = Kunjungan::with(['hewan', 'dokterHewan', 'kunjunganSebelumnya'])->get();
        return view('kunjungans.index', compact('kunjungans'));
    }

    public function create()
    {
        $hewans = Hewan::all();
        $dokterhewan = DokterHewan::all();
        $kunjungans = Kunjungan::all();
        return view('kunjungans.create', compact('hewans', 'dokterhewan', 'kunjungans'));
    }

    public function store(Request $request)
{
    $request->validate([
        'id_hewan' => 'required|integer',
        'id_dokter' => 'required|integer',
        'tanggal_kunjungan' => 'required|date',
        'deskripsi' => 'required|string'
    ]);

    // Cari kunjungan terakhir berdasarkan id_hewan
    $kunjunganSebelumnya = Kunjungan::where('id_hewan', $request->id_hewan)
        ->orderByDesc('tanggal_kunjungan')
        ->first();

    // Simpan data baru
    Kunjungan::create([
        'id_hewan' => $request->id_hewan,
        'id_dokter' => $request->id_dokter,
        'tanggal_kunjungan' => $request->tanggal_kunjungan,
        'id_kunjungan_sebelumnya' => $kunjunganSebelumnya?->id_kunjungan,
        'deskripsi' => $request?->deskripsi,
    ]);

    return redirect()->route('kunjungans.index')->with('success', 'Kunjungan berhasil ditambahkan');
}


    public function show(Kunjungan $kunjungan)
    {
        return view('kunjungans.show', compact('kunjungan'));
    }

    public function edit(Kunjungan $kunjungan)
    {
        $hewans = Hewan::all();
        $dokterHewans = DokterHewan::all();
        $kunjungans = Kunjungan::where('id_kunjungan', '!=', $kunjungan->id_kunjungan)->get();
        return view('kunjungans.edit', compact('kunjungan', 'hewans', 'dokterHewans', 'kunjungans'));
    }

    public function update(Request $request, Kunjungan $kunjungan)
    {
        $request->validate([
            'id_hewan' => 'required|exists:hewan,id_hewan',
            'id_dokter' => 'required|exists:dokter_hewan,id_dokter',
            'tanggal_kunjungan' => 'required|date',
            'id_kunjungan_sebelumnya' => 'nullable|exists:kunjungan,id_kunjungan',
            'deskripsi' => 'required|string'

        ]);

        $kunjungan->update($request->all());

        return redirect()->route('kunjungans.index')
            ->with('success', 'Data kunjungan berhasil diperbarui');
    }

    public function destroy(Kunjungan $kunjungan)
    {
        $kunjungan->delete();

        return redirect()->route('kunjungans.index')
            ->with('success', 'Kunjungan berhasil dihapus');
    }
}
