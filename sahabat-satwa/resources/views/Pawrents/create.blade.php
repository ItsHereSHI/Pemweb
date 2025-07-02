@extends('layouts.app')

@section('title', 'Tambah Pemilik Hewan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Tambah Pemilik Hewan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('pawrents.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            <div class="form-group">
                <label for="no_telepon">No. Telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pawrents.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
