@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Tambah Kunjungan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('kunjungans.store') }}" method="POST">
            @csrf

            <!-- Pilih Hewan -->
            <div class="mb-3">
                <label for="id_hewan" class="form-label">Hewan</label>
                <select name="id_hewan" id="id_hewan" class="form-select" required>
                    <option value="" disabled selected>Pilih Hewan</option>
                    @foreach($hewans as $hewan)
                        <option value="{{ $hewan->id_hewan }}">{{ $hewan->nama_hewan }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Pilih Dokter -->
            <div class="mb-3">
                <label for="id_dokter" class="form-label">Dokter Hewan</label>
                <select name="id_dokter" id="id_dokter" class="form-select" required>
                    <option value="" disabled selected>Pilih Dokter</option>
                    @foreach($dokterhewan as $dokter)
                        <option value="{{ $dokter->id_dokter }}">{{ $dokter->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Kunjungan -->
            <div class="mb-3">
                <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
                <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control" required>
            </div>
                <!-- Deskripsi Kunjungan -->
<div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi / Keluhan</label>
    <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control" required>{{ old('deskripsi') }}</textarea>
</div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
