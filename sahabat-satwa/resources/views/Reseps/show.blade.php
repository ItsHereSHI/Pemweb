@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text text-white">Detail Resep</h1>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Informasi Resep</h4>
        </div>
        <div class="card-body">
            @if (!$resep->kunjungan || !$resep->obat)
                <div class="alert alert-warning" role="alert">
                    Beberapa informasi tidak tersedia.
                </div>
            @endif

            <!-- Nama Pemilik dan Kunjungan -->
            <div class="d-flex mb-3">
                <h5 class="card-title mb-0" style="width: 150px;"><strong>Nama Pemilik</strong></h5>
                <span class="text-muted">{{ $resep->kunjungan->hewan->pawrent->nama_lengkap ?? 'Tidak tersedia' }}</span>
            </div>

            <!-- ID Kunjungan dan Tanggal Kunjungan -->
            <div class="d-flex mb-3">
                <h5 class="card-title mb-0" style="width: 150px;"><strong>ID Kunjungan</strong></h5>
                <span class="text-muted">{{ $resep->kunjungan->id_kunjungan ?? 'Tidak tersedia' }}</span>
            </div>
            <div class="d-flex mb-3">
                <h5 class="card-title mb-0" style="width: 150px;"><strong>Tanggal Kunjungan</strong></h5>
                <span class="text-muted">{{ $resep->kunjungan->tanggal_kunjungan ?? 'Tidak tersedia' }}</span>
            </div>

            <!-- Informasi Hewan -->
            <div class="d-flex mb-3">
                <h5 class="card-title mb-0" style="width: 150px;"><strong>Hewan</strong></h5>
                <span class="text-muted">{{ $resep->kunjungan->hewan->jenis_hewan ?? 'Tidak tersedia' }}</span>
            </div>

            <!-- Obat, Dosis, dan Frekuensi -->
            <div class="d-flex mb-3">
                <h5 class="card-title mb-0" style="width: 150px;"><strong>Obat</strong></h5>
                <span class="text-muted">{{ $resep->obat->nama_obat ?? 'Tidak tersedia' }}</span>
            </div>
            <div class="d-flex mb-3">
                <h5 class="card-title mb-0" style="width: 150px;"><strong>Dosis</strong></h5>
                <span class="text-muted">{{ $resep->dosis }}</span>
            </div>
            <div class="d-flex mb-3">
                <h5 class="card-title mb-0" style="width: 150px;"><strong>Frekuensi</strong></h5>
                <span class="text-muted">{{ $resep->frekuensi }}</span>
            </div>

            <!-- Button Kembali -->
            <div class="text-end">
                <a href="{{ route('reseps.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
</div>
@endsection
