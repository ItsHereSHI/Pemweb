@extends('layouts.app')

@section('title', 'Detail Pemilik Hewan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Detail Pemilik Hewan</h5>
    </div>
    <div class="card-body">
        <p><strong>Nama Lengkap:</strong> {{ $pawrent->nama_lengkap }}</p>
        <p><strong>No. Telepon:</strong> {{ $pawrent->no_telepon }}</p>
        <a href="{{ route('pawrents.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
    </div>
</div>
@endsection
