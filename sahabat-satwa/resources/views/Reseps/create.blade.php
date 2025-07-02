@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Tambah Resep</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('reseps.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="id_kunjungan" class="form-label">ID Kunjungan</label>
                    <select name="id_kunjungan" id="id_kunjungan" class="form-select" required>
                        <option value="">-- Pilih Kunjungan --</option>
                        @foreach($kunjungans as $kunjungan)
                            <option value="{{ $kunjungan->id_kunjungan }}">{{ $kunjungan->id_kunjungan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_obat" class="form-label">Obat</label>
                    <select name="id_obat" id="id_obat" class="form-select" required>
                        <option value="">-- Pilih Obat --</option>
                        @foreach($obats as $obat)
                            <option value="{{ $obat->id_obat }}">{{ $obat->nama_obat }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="dosis" class="form-label">Dosis</label>
                    <input type="text" name="dosis" id="dosis" class="form-control" placeholder="Contoh: 1 tablet" required>
                </div>

                <div class="mb-3">
                    <label for="frekuensi" class="form-label">Frekuensi</label>
                    <input type="text" name="frekuensi" id="frekuensi" class="form-control" placeholder="Contoh: 3x sehari" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('reseps.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
