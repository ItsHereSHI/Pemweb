@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Detail Obat</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>Nama Obat:</strong>
            <p class="mb-0">{{ $obat->nama_obat }}</p>
        </div>

        <div class="mb-3">
            <strong>Petunjuk Penggunaan:</strong>
            <p class="mb-0">{{ $obat->petunjuk_penggunaan }}</p>
        </div>

        <a href="{{ route('obats.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>
@endsection
