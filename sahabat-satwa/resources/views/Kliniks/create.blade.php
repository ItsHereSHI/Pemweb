@extends('layouts.app')

@section('title', 'Tambah Klinik Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Tambah Klinik Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('kliniks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_klinik" class="form-label">Nama Klinik</label>
                <input type="text" class="form-control" id="nama_klinik" name="nama_klinik" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="no_telepon" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kliniks.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection