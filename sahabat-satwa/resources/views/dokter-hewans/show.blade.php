@extends('layouts.app')

@section('title', 'Detail Dokter Hewan')

@section('content')
<div class="container" style="max-width: 700px;">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0"><i class="fas fa-user-md"></i> Detail Dokter Hewan</h4>
        </div>
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th style="width: 200px;">Nama Lengkap</th>
                    <td>{{ $dokterHewan->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th>No Telepon</th>
                    <td>{{ $dokterHewan->no_telepon }}</td>
                </tr>
                <tr>
                    <th>Tanggal Mulai Bekerja</th>
                    <td>{{ \Carbon\Carbon::parse($dokterHewan->tanggal_mulai_bekerja)->format('d M Y') }}</td>
                </tr>
                <tr>
                    <th>Klinik Tetap</th>
                    <td>{{ $dokterHewan->klinik->nama_klinik }}</td>
                </tr>
                <tr>
                    <th>Bidang Spesialisasi</th>
                    <td>{{ $dokterHewan->spesialisasi }}</td>
                </tr>
            </table>

            <a href="{{ route('dokter-hewans.index') }}" class="btn btn-secondary mt-3">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
