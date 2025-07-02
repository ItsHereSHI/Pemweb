@extends('layouts.app')

@section('title', 'Edit Data Klinik')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Data Klinik</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('kliniks.update', $klinik->id_klinik) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_klinik" class="form-label">Nama Klinik</label>
                <input type="text" class="form-control" id="nama_klinik" name="nama_klinik" value="{{ $klinik->nama_klinik }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $klinik->alamat }}</textarea>
            </div>
            <div class="mb-3">
                <label for="no_telepon" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $klinik->no_telepon }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('kliniks.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection