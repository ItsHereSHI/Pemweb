@extends('layouts.app')

@section('title', 'Tambah Dokter Hewan')

@section('content')
<div class="container" style="max-width: 700px;">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Tambah Dokter Hewan</h4>
        </div>
        <div class="card-body">
                <form action="{{ route('dokter-hewans.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                    @error('nama_lengkap')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="text" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" value="{{ old('no_telepon') }}" required>
                    @error('no_telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_mulai_bekerja" class="form-label">Tanggal Mulai Bekerja</label>
                    <input type="date" name="tanggal_mulai_bekerja" class="form-control @error('tanggal_mulai_bekerja') is-invalid @enderror" id="tanggal_mulai_bekerja" value="{{ old('tanggal_mulai_bekerja') }}" required>
                    @error('tanggal_mulai_bekerja')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="id_klinik_tetap" class="form-label">Klinik Tetap</label>
                    <select name="id_klinik_tetap" class="form-control @error('id_klinik_tetap') is-invalid @enderror" id="id_klinik_tetap" required>
                        <option value="">-- Pilih Klinik --</option>
                        @foreach ($kliniks as $klinik)
                            <option value="{{ $klinik->id_klinik }}" {{ old('id_klinik_tetap') == $klinik->id_klinik ? 'selected' : '' }}>
                                {{ $klinik->nama_klinik }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_klinik_tetap')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="spesialisasi" class="form-label">Spesialisasi</label>
                    <select name="spesialisasi" class="form-control @error('spesialisasi') is-invalid @enderror" id="spesialisasi" required>
                        <option value="">-- Pilih Spesialisasi --</option>
                        <option value="bedah" {{ old('spesialisasi') == 'bedah' ? 'selected' : '' }}>Bedah</option>
                        <option value="dermatologi" {{ old('spesialisasi') == 'dermatologi' ? 'selected' : '' }}>Dermatologi</option>
                        <option value="penyakit dalam" {{ old('spesialisasi') == 'penyakit dalam' ? 'selected' : '' }}>Penyakit Dalam</option>
                    </select>
                    @error('spesialisasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Foto Dokter Hewan</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
