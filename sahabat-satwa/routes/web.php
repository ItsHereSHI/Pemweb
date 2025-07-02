<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterHewanController;
use App\Http\Controllers\PawrentController;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\KlinikController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KonsultasiController;


Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/login/admin', [AdminController::class, 'showloginform'])->name('admin.login');
Route::post('/login', [AdminController::class, 'login'])->name('login.process');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/logout', [AdminController::class, 'logout'])->name('logout');





Route::resource('admin', AdminController::class);



Route::resource('kunjungans', KunjunganController::class);
Route::resource('pawrents', PawrentController::class);
Route::resource('hewans', HewanController::class);
Route::resource('kliniks', KlinikController::class);
Route::resource('dokter-hewans', DokterHewanController::class);

Route::resource('reseps', ResepController::class);
Route::resource('audit-logs', AuditLogController::class);

Route::resource('obats', ObatController::class);

Route::get('/kunjungan-lengkap', [DashboardController::class, 'getKunjunganLengkap'])->name('kunjungan.lengkap');


// Login dan dashboard untuk Pawrent
// Form registrasi pawrent
Route::get('/register/pawrent', [PawrentController::class, 'showRegisterForm'])->name('pawrent.register');

// Proses registrasi pawrent
Route::post('/register/pawrent', [PawrentController::class, 'register']);

Route::get('/login/pawrent', [PawrentController::class, 'showLoginForm'])->name('pawrent.login');
Route::post('/login/pawrent', [PawrentController::class, 'login'])->name('pawrent.login.process');
Route::get('/dashboard/pawrent', [PawrentController::class, 'dashboard'])->name('pawrents.dashboard');
Route::get('/dashboard/pawrent/dokter', [PawrentController::class, 'dokter'])->name('pawrents.dokterhewan');
Route::get('/pawrent/dokter/{dokterHewan}', [PawrentController::class, 'doktershow'])->name('pawrents.dokterhewan.show');
Route::get('/dashboard/pawrent/obat', [PawrentController::class, 'obat'])->name('pawrents.obat');
Route::get('/pawrent/obat/{obat}', [PawrentController::class, 'obatshow'])->name('pawrents.obatshow');
Route::get('/logout/pawrent', [PawrentController::class, 'logout'])->name('pawrent.logout');
Route::get('/login/dokter-hewan', [DokterHewanController::class, 'showLoginForm'])->name('dokterhewan.login');
Route::post('/login/dokter-hewan', [DokterHewanController::class, 'login'])->name('dokterhewans.login.process');
Route::get('/dashboard/dokter-hewan', [DokterHewanController::class, 'dashboard'])->name('dokterhewans.dashboard');
Route::get('/logout/dokter-hewan', [DokterHewanController::class, 'logout'])->name('dokterhewans.logout');

Route::get('/dokterhewans/pawrents', [DokterHewanController::class, 'pawrents'])->name('dokterhewans.pawrents');

Route::get('/konsultasi/{id_dokter}/buat', [KonsultasiController::class, 'create'])->name('konsultasi.create');
Route::post('/konsultasi', [KonsultasiController::class, 'store'])->name('konsultasi.store');
Route::get('/konsultasi-saya', [KonsultasiController::class, 'konsultasipawrent'])->name('konsultasi.pawrent');

Route::put('/dokterhewans/balas/{id}', [DokterHewanController::class, 'balasKonsultasi'])->name('dokter.balas');

Route::get('/dokter/konsultasi/{id}/balas', [KonsultasiController::class, 'showBalas'])->name('dokter.konsultasi.balas');
Route::post('/dokter/konsultasi/{id}/balas', [KonsultasiController::class, 'simpanBalasan'])->name('dokter.konsultasi.balas.store');
Route::get('/dokter/konsultasi', [KonsultasiController::class, 'konsultasiMasuk'])->name('konsultasi.index');
Route::post('/dokter/rating', [KonsultasiController::class, 'submitRating'])->name('dokter.rating');
