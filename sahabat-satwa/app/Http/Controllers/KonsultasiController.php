<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Konsultasi;
use App\Models\Pawrent;
use App\Models\DokterHewan;
use Illuminate\Http\Request;
use App\Models\RatingDokter;

class KonsultasiController extends Controller
{
    // Menampilkan form untuk membuat konsultasi
    public function create($id_dokter)
    {
        $dokterhewan = DokterHewan::findOrFail($id_dokter);

        return view('konsultasi.create', compact('dokterhewan'));
    }

    // Menyimpan konsultasi baru


    public function store(Request $request)
{
    // Validasi data input
    $request->validate([
        'id_dokter' => 'required|exists:dokter_hewan,id_dokter',  // Pastikan id_dokter ada di tabel dokter_hewan
        'keluhan' => 'required|string|max:1000',  // Pastikan keluhan tidak kosong dan valid
    ]);

    // Ambil id_pawrent dari session
    $id_pawrent = session('pawrent')->id_pawrent;

    // Panggil prosedur insertKonsultasi untuk menyimpan data
    DB::statement('CALL insertKonsultasi(?, ?, ?)', [
        $id_pawrent,  // ID Pawrent (dari session)
        $request->id_dokter,  // ID Dokter dari request
        $request->keluhan,  // Pesan Keluhan dari request
    ]);

    // Redirect kembali ke halaman dengan pesan sukses
    return redirect()->route('konsultasi.pawrent')->with('success', 'Konsultasi berhasil dikirim.');
}




    // Menampilkan semua konsultasi untuk dokter
    public function indexForDokter()
    {
        $dokter = session('dokter_hewans');
        $konsultasis = Konsultasi::where('id_dokter', $dokter->id_dokter)->get();
        return view('konsultasi.index', compact('konsultasis'));
    }

    // Menandai status konsultasi
    public function updateStatus(Konsultasi $konsultasi, $status)
    {
        // Pastikan dokter yang login adalah yang terkait dengan konsultasi ini
        $dokter = session('dokter_hewans');
        if ($dokter->id_dokter !== $konsultasi->id_dokter) {
            return redirect()->route('dokterhewans.dashboard')->with('error', 'Akses ditolak.');
        }

        // Update status konsultasi
        $konsultasi->update(['status' => $status]);

        return redirect()->route('dokterhewans.dashboard')->with('success', 'Status konsultasi berhasil diperbarui.');
    }
    public function konsultasiMasuk()
{
    $dokter = session('dokter_hewans');

    if (!$dokter) {
        return redirect()->route('dokterhewan.login')->withErrors(['login' => 'Silakan login sebagai dokter.']);
    }

    $konsultasis = Konsultasi::with('pawrent')
                    ->where('id_dokter', $dokter->id_dokter)
                    ->orderBy('id', 'desc')
                    ->get();

    return view('konsultasi.index', compact('konsultasis'));
}
public function showBalas($id)
{
    $konsultasi = Konsultasi::findOrFail($id);

    return view('konsultasi.balas', compact('konsultasi'));
}

public function simpanBalasan(Request $request, $id)
{
    $request->validate([
        'balasan' => 'required'
    ]);

    $konsultasi = Konsultasi::findOrFail($id);
    $konsultasi->balasan = $request->balasan;
    $konsultasi->status = 'selesai';  // Menandai konsultasi selesai setelah dibalas
    $konsultasi->save();

    return redirect()->route('konsultasi.index')->with('success', 'Balasan berhasil dikirim.');
}
public function konsultasipawrent()
{
    $id_pawrent = session('pawrent')['id_pawrent'] ?? null;
    if (!$id_pawrent) {
        return redirect()->route('login')->with('error', 'Anda perlu login terlebih dahulu.');
    }

    // Ambil semua konsultasi yang dikirim oleh pawrent ini
    $konsultasis = Konsultasi::with('dokter')  // Mengambil relasi dokter
        ->where('id_pawrent', $id_pawrent)
        ->orderBy('id', 'desc')
        ->get();

    // Tambahkan properti 'sudah_rating' untuk setiap konsultasi
    foreach ($konsultasis as $konsultasi) {
        // Mengecek apakah pawrent sudah memberi rating untuk dokter ini
        $konsultasi->sudah_rating = RatingDokter::where('id_pawrent', $id_pawrent)
                                                 ->where('id_dokter', $konsultasi->dokter->id_dokter)
                                                 ->exists();
    }

    return view('konsultasi.pawrent', compact('konsultasis'));
}






public function submitRating(Request $request)
{
    $request->validate([
        'dokter_id' => 'required|exists:dokter_hewan,id_dokter',
        'rating' => 'required|integer|min:1|max:5',
    ]);

    $id_pawrent = session('pawrent')['id_pawrent'];

    // Cegah rating dobel
    $existing = RatingDokter::where('id_pawrent', $id_pawrent)
        ->where('id_dokter', $request->dokter_id)
        ->first();

    if ($existing) {
        return redirect()->back()->with('error', 'Anda sudah memberikan rating untuk dokter ini.');
    }

    // Simpan rating baru
    RatingDokter::create([
        'id_pawrent' => $id_pawrent,
        'id_dokter' => $request->dokter_id,
        'rating' => $request->rating,
    ]);

    // Hitung rata-rata rating dokter
    $avg = RatingDokter::where('id_dokter', $request->dokter_id)->avg('rating');

    // Simpan ke kolom dokter_hewan.rating
    $dokter = DokterHewan::findOrFail($request->dokter_id);
    $dokter->rating = round($avg, 1);
    $dokter->save();

    return redirect()->back()->with('success', 'Rating anda berhasil dikirim.');
}

}

