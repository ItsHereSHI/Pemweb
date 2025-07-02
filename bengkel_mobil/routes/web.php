<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\LaporanController;

Route::resource('pelanggan', App\Http\Controllers\PelangganController::class);
Route::resource('transaksi', App\Http\Controllers\TransaksiController::class);
Route::resource('pegawai', App\Http\Controllers\PegawaiController::class);
Route::resource('jabatan', App\Http\Controllers\JabatanController::class);
Route::resource('nomor_pegawai', App\Http\Controllers\NomorPegawaiController::class);
Route::resource('header_transaksi', App\Http\Controllers\HeaderTransaksiController::class);
Route::resource('service', App\Http\Controllers\ServiceController::class);
Route::resource('pembelian_service', App\Http\Controllers\PembelianServiceController::class);
Route::resource('sparepart', App\Http\Controllers\SparepartController::class);
Route::resource('pembelian_sparepart', App\Http\Controllers\PembelianSparepartController::class);

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/procedure', [ProcedureController::class, 'index'])->name('procedure.index');
Route::get('/procedure/insert', [ProcedureController::class, 'ShowForm'])->name('insertform');
Route::post('/procedure/insert/action', [ProcedureController::class, 'InsertData'])->name('insertdata');

Route::get('/hitung-pemasukan', [ProcedureController::class, 'showHitungForm']) ->name('hitung.form');

Route::post('/hitung-pemasukan', [ProcedureController::class, 'Hitung'])->name('hitung');

Route::match(['get', 'post'], '/procedure/detail_service', [ProcedureController::class, 'detailService'])->name('procedure.detail_service');

Route::get('/view', [ViewController::class, 'index'])->name('view');
Route::get('/view/1', [ViewController::class, 'view1'])->name('view1');
Route::get('/view/2', [ViewController::class, 'view2'])->name('view2');
Route::get('/view/3', [ViewController::class, 'view3'])->name('view3');

// routes/web.php
Route::get('/laporan/transaksi', [LaporanController::class, 'index'])->name('laporan.transaksi');
Route::get('/laporan/transaksi/cetak', [LaporanController::class, 'cetakPDF'])->name('laporan.transaksi.cetak');
