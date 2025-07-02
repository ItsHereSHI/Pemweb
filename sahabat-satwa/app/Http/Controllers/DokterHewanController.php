<?php

namespace App\Http\Controllers;

use App\Models\DokterHewan;
use App\Models\Klinik;
use App\Models\Pawrent;
use App\Models\Konsultasi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class DokterHewanController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.dokterhewan-login'); // View login Dokter Hewan
    }

    public function login(Request $request)
    {
        // Cek apakah username dan password cocok dengan data di database
        $dokterHewan = DokterHewan::where('username', $request->username)
                                   ->where('password', $request->password)
                                   ->first();

        if ($dokterHewan) {
            // Simpan data dokter hewan ke session
            Session::put('dokter_hewans', $dokterHewan);
            return redirect()->route('dokterhewans.dashboard'); // Redirect ke dashboard Dokter Hewan
        }

        return back()->withErrors(['login' => 'Login gagal. Cek username dan password anda.']);
    }

    public function dashboard()
    {
        return view('dokter-hewans.dashboard'); // Dashboard Dokter Hewan
    }

    public function logout()
    {
        // Hapus session dokter hewan
        Session::forget('dokter_hewans');
        return redirect('/login/dokter-hewan');
    }
    public function index()
    {
        $dokterHewans = DokterHewan::with('klinik')->get();
        return view('dokter-hewans.index', compact('dokterHewans'));
    }

    public function create()
    {
        $kliniks = Klinik::all();
        return view('dokter-hewans.create', compact('kliniks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'tanggal_mulai_bekerja' => 'required|date',
            'id_klinik_tetap' => 'required|exists:klinik,id_klinik',
            'spesialisasi' => 'nullable|in:bedah,dermatologi,penyakit dalam',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('dokter_images', 'public');
            $data['image'] = $imagePath;
        }

        DokterHewan::create($data);

        return redirect()->route('dokter-hewans.index')
            ->with('success', 'Dokter hewan berhasil ditambahkan');
    }





    public function show(DokterHewan $dokterHewan)
    {
        return view('dokter-hewans.show', compact('dokterHewan'));
    }

    public function edit(DokterHewan $dokterHewan)
    {
        $kliniks = Klinik::all();
        return view('dokter-hewans.edit', compact('dokterHewan', 'kliniks'));
    }

    public function update(Request $request, DokterHewan $dokterHewan)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'tanggal_mulai_bekerja' => 'required|date',
            'id_klinik_tetap' => 'required|exists:klinik,id_klinik',
            'spesialisasi' => 'nullable|in:bedah,dermatologi,penyakit dalam',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('dokter_images', 'public');
            $data['image'] = $imagePath;
        }

        $dokterHewan->update($data);

        return redirect()->route('dokter-hewans.index')
            ->with('success', 'Data dokter hewan berhasil diperbarui');
    }

    public function destroy(DokterHewan $dokterHewan)
    {
        $dokterHewan->delete();

        return redirect()->route('dokter-hewans.index')
            ->with('success', 'Dokter hewan berhasil dihapus');
    }

    public function pawrents()
    {
        $pawrents = Pawrent::all();
        return view('userdokter.pawrents', compact('pawrents'));
    }



public function balasKonsultasi(Request $request, $id)
{
    // Cari konsultasi yang akan dibalas
    $konsultasi = Konsultasi::findOrFail($id);

    // Validasi input balasan
    $request->validate([
        'balasan' => 'required|string',
    ]);

    // Update balasan
    $konsultasi->balasan = $request->balasan;
    $konsultasi->status = 'selesai';
    $konsultasi->save();

    // Redirect ke halaman konsultasi dokter hewan dengan pesan sukses
    return redirect()->route('userdokter.konsultasi')->with('success', 'Balasan berhasil dikirim.');
}

}
