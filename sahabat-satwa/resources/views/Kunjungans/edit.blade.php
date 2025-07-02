@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Kunjungan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('kunjungans.update', $kunjungan) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Pilih Hewan -->
            <div class="mb-3">
                <label for="id_hewan" class="form-label">Hewan</label>
                <select name="id_hewan" id="id_hewan" class="form-select" required>
                    <option value="" disabled>Pilih Hewan</option>
                    @foreach($hewans as $hewan)
                        <option value="{{ $hewan->id_hewan }}" {{ $hewan->id_hewan == $kunjungan->id_hewan ? 'selected' : '' }}>
                            {{ $hewan->id_hewan }}
                        </option> <!-- Menampilkan ID Hewan -->
                    @endforeach
                </select>
            </div>

            <!-- Pilih Dokter -->
            <div class="mb-3">
                <label for="id_dokter" class="form-label">Dokter Hewan</label>
                <select name="id_dokter" id="id_dokter" class="form-select" required>
                    <option value="" disabled>Pilih Dokter</option>
                    @foreach($dokterHewans as $dokter)
                        <option value="{{ $dokter->id_dokter }}" {{ $dokter->id_dokter == $kunjungan->id_dokter ? 'selected' : '' }}>
                            {{ $dokter->nama_lengkap }}
                        </option> <!-- Menampilkan Nama Dokter -->
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Kunjungan -->
            <div class="mb-3">
                <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
                <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control" value="{{ $kunjungan->tanggal_kunjungan }}" required>
            </div>
            <!-- Deskripsi / Keluhan -->
<div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi / Keluhan</label>
    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required>{{ $kunjungan->deskripsi }}</textarea>
</div>

            <!-- Tombol Update -->
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</div>
@endsection
