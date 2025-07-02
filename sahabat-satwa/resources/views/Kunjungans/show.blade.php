@extends('layouts.app')

@section('title', 'Detail Kunjungan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Detail Kunjungan</h5>
    </div>
    <div class="card-body">
        <dl>
            <dt>ID Kunjungan</dt>
            <dd>{{ $kunjungan->id_kunjungan }}</dd>

            <dt>ID Hewan</dt>
            <dd>{{ $kunjungan->id_hewan }}</dd>
            <dt>Nama Hewan</dt>
            <dd>{{ $kunjungan->hewan->nama_hewan }}</dd>
            <dt>Jenis Hewan</dt>
            <dd>{{ $kunjungan->hewan->jenis_hewan }}</dd>

            <dt>ID Dokter</dt>
            <dd>{{ $kunjungan->id_dokter }}</dd>
            <dt>Nama Dokter</dt>
            <dd>{{ $kunjungan->dokterHewan->nama_lengkap }}</dd>
            <dt>Deskripsi Keluhan</dt>
            <dd>{{ $kunjungan->deskripsi }}</dd>

            <dt>Tanggal Kunjungan</dt>
            <dd>{{ \Carbon\Carbon::parse($kunjungan->tanggal_kunjungan)->translatedFormat('d F Y') }}</dd>

            <dt>ID Kunjungan Sebelumnya</dt>
            <dd>{{ $kunjungan->id_kunjungan_sebelumnya ?? 'Tidak ada' }}</dd>
        </dl>

        <a href="{{ route('kunjungans.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
