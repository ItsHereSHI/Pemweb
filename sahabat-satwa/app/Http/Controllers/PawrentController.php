<?php
namespace App\Http\Controllers;

use App\Models\Pawrent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\DokterHewan;
use App\Models\Obat;
use Illuminate\Support\Facades\Hash;


class PawrentController extends Controller
{
    // Tampilkan form registrasi
public function showRegisterForm()
{
    return view('auth.register');
}

// Proses registrasi
public function register(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'no_telepon' => 'required|string|max:20',
        'username' => 'required|string|max:50|unique:pawrent,username',
        'password' => 'required|string|min:6|confirmed',
    ]);

    Pawrent::create([
        'nama_lengkap' => $request->nama_lengkap,
        'no_telepon' => $request->no_telepon,
        'username' => $request->username,
        'password' => Hash::make($request->password), // <-- hash password di sini
    ]);

    return redirect('/login/pawrent')->with('success', 'Registrasi berhasil. Silakan login.');
}

    public function showLoginForm()
    {
        return view('auth.pawrent-login');
    }

    public function login(Request $request)
{
    $pawrent = Pawrent::where('username', $request->username)->first();

    if ($pawrent && Hash::check($request->password, $pawrent->password)) {
        Session::put('pawrent', $pawrent);
        return redirect()->route('pawrents.dashboard');
    }

    // debug: cek username & password input apa
    return back()->withErrors(['login' => 'Login gagal. Cek username dan password anda.'])->withInput();
}



    public function dashboard()
    {
        // Cek apakah pawrent sudah login
        if (Session::has('pawrent')) {
            $pawrent = Session::get('pawrent');
            $dokters = DokterHewan::all(); // Ambil semua dokter

            return view('pawrents.dashboard', compact('pawrent', 'dokters'));
        }


        // Kalau belum login, redirect ke login pawrent
        return redirect('/login/pawrent');
    }
    public function dokter()
    {
        $dokterHewans = DokterHewan::with('klinik')->get();
        return view('userpawrents.dokterhewan', compact('dokterHewans'));

    }
    public function doktershow(DokterHewan $dokterHewan)
    {
        $dokterHewan->load('klinik'); // Load relasi klinik untuk dokter yang dipilih
        return view('userpawrents.doktershow', compact('dokterHewan'));
    }


    public function obat()
    {
        $obats = Obat::all();
        return view('userpawrents.obat', compact('obats'));
    }
    public function obatshow(Obat $obat)
    {
        return view('userpawrents.obatshow', compact('obat'));
    }
    public function logout()
    {
        // Hapus session pawrent
        Session::forget('pawrent');
        return redirect('/');
    }

    public function index()
    {
        $pawrents = Pawrent::all();
        return view('pawrents.index', compact('pawrents'));
    }

    public function create()
    {
        return view('pawrents.create');
    }

    public function store(Request $request)
    {
        // Menghapus validasi password_hash
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
        ]);

        Pawrent::create($request->all());

        return redirect()->route('pawrents.index')
            ->with('success', 'Pemilik hewan berhasil ditambahkan');
    }

    public function show(Pawrent $pawrent)
    {
        return view('pawrents.show', compact('pawrent'));
    }

    public function edit(Pawrent $pawrent)
    {
        return view('pawrents.edit', compact('pawrent'));
    }

    public function update(Request $request, Pawrent $pawrent)
    {
        // Menghapus validasi password_hash
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
        ]);

        $pawrent->update($request->all());

        return redirect()->route('pawrents.index')
            ->with('success', 'Data pemilik hewan berhasil diperbarui');
    }

    public function destroy(Pawrent $pawrent)
    {
        $pawrent->delete();

        return redirect()->route('pawrents.index')
            ->with('success', 'Pemilik hewan berhasil dihapus');
    }
}
