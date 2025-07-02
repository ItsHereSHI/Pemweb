@extends('layouts.app')

@section('title', 'Edit Dokter Hewan')

@section('content')
<div class="container" style="max-width: 700px;">
    <div class="card">
        <div class="card-header bg-warning">
            <h4 class="mb-0">Edit Dokter Hewan</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('dokter-hewans.update', $dokterHewan) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror"
                           id="nama_lengkap" value="{{ old('nama_lengkap', $dokterHewan->nama_lengkap) }}" required>
                    @error('nama_lengkap')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="text" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror"
                           id="no_telepon" value="{{ old('no_telepon', $dokterHewan->no_telepon) }}" required>
                    @error('no_telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_mulai_bekerja" class="form-label">Tanggal Mulai Bekerja</label>
                    <input type="date" name="tanggal_mulai_bekerja" class="form-control @error('tanggal_mulai_bekerja') is-invalid @enderror"
                           id="tanggal_mulai_bekerja" value="{{ old('tanggal_mulai_bekerja', $dokterHewan->tanggal_mulai_bekerja) }}" required>
                    @error('tanggal_mulai_bekerja')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="id_klinik_tetap" class="form-label">Klinik Tetap</label>
                    <select name="id_klinik_tetap" class="form-control @error('id_klinik_tetap') is-invalid @enderror"
                            id="id_klinik_tetap" required>
                        <option value="">-- Pilih Klinik --</option>
                        @foreach ($kliniks as $klinik)
                            <option value="{{ $klinik->id_klinik }}"
                                {{ old('id_klinik_tetap', $dokterHewan->id_klinik_tetap) == $klinik->id_klinik ? 'selected' : '' }}>
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
                        <option value="bedah" {{ old('spesialisasi', $dokterHewan->spesialisasi) == 'bedah' ? 'selected' : '' }}>Bedah</option>
                        <option value="dermatologi" {{ old('spesialisasi', $dokterHewan->spesialisasi) == 'dermatologi' ? 'selected' : '' }}>Dermatologi</option>
                        <option value="penyakit dalam" {{ old('spesialisasi', $dokterHewan->spesialisasi) == 'penyakit dalam' ? 'selected' : '' }}>Penyakit Dalam</option>
                    </select>
                    @error('spesialisasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="image">Foto Dokter Hewan</label>
                        <input type="file" name="image" class="form-control">

                        @if ($dokterHewan->image)
                            <div class="mt-2">
                                <strong>Gambar Saat Ini:</strong><br>
                                <img src="{{ asset('storage/' . $dokterHewan->image) }}" alt="Foto Dokter Hewan" width="150px">
                            </div>
                        @endif
                    </div>


                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Update
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
