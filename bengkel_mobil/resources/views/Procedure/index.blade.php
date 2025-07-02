@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="text-center mb-5">
            <h1 class="fw-bold">Daftar Prosedur</h1>
            <p class="text-muted">Pilih prosedur yang ingin dijalankan di aplikasi bengkel mobil Anda</p>
        </div>

        <div class="row justify-content-center g-4">
            <div class="col-md-5 col-lg-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="mb-3">
                            <h5 class="card-title">Insert Data</h5>
                            <p class="card-text text-muted">Menambahkan data pelanggan, pegawai, sparepart, dan transaksi baru.</p>
                        </div>
                        <a href="{{ route('insertform') }}" class="btn btn-primary w-100">Jalankan Prosedur</a>
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-lg-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="mb-3">
                            <h5 class="card-title">Hitung Pemasukan</h5>
                            <p class="card-text text-muted">Menghitung total pemasukan per pegawai dalam periode tertentu.</p>
                        </div>
                        <a href="{{ route('hitung.form') }}" class="btn btn-success w-100">Jalankan Prosedur</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mb-5">
            <h1 class="fw-bold"> Function</h1>
            <p class="text-muted">Fungsi untuk menampilkan detail pembelian sparepart atau service berdasarkan ID transaksi. </p>
        </div>
        <div class="row justify-content-center g-4">
            <div class="col-md-5 col-lg-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <!-- Mengubah metode POST ke GET jika tujuannya menampilkan form -->
                        <form action="{{ route('procedure.detail_service') }}" method="GET">
                            @csrf

                            <button type="submit" class="btn btn-primary w-100">Jalankan Function</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
