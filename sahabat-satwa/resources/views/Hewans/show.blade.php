@extends('layouts.app')

@section('title', 'Detail Hewan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Detail Hewan Peliharaan</h5>
    </div>
    <div class="card-body">
        <dl>
            <dt>Nama Hewan</dt>
            <dd>{{ $hewan->nama_hewan }}</dd>

            <dt>Jenis Hewan</dt>
            <dd>{{ $hewan->jenis_hewan }}</dd>

            <dt>Umur</dt>
            <dd>{{ \Carbon\Carbon::parse($hewan->tahun_lahir)->age }} tahun</dd>

            <dt>Pemilik Hewan</dt>
            <dd>{{ $hewan->pawrent->nama_lengkap }}</dd>
        </dl>
        <a href="{{ route('hewans.edit', $hewan->id_hewan) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('hewans.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
