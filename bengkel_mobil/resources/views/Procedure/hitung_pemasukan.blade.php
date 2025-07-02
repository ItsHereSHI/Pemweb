@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">📈 Hitung Total Pemasukan</h2>

    <form method="POST" action="{{ route('hitung') }}" >
        @csrf

        <div class="col-md-4">
            <label for="id_pegawai" class="form-label">ID Pegawai</label>
            <input type="number"
                   class="form-control @error('id_pegawai') is-invalid @enderror"
                   id="id_pegawai"
                   name="id_pegawai"
                   value="{{ old('id_pegawai', $data['id_pegawai'] ?? '') }}"
                   required>
            @error('id_pegawai')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-4">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date"
                   class="form-control @error('tanggal_mulai') is-invalid @enderror"
                   id="tanggal_mulai"
                   name="tanggal_mulai"
                   value="{{ old('tanggal_mulai', $data['tanggal_mulai'] ?? '') }}"
                   required>
            @error('tanggal_mulai')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-md-4">
            <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
            <input type="date"
                   class="form-control @error('tanggal_akhir') is-invalid @enderror"
                   id="tanggal_akhir"
                   name="tanggal_akhir"
                   value="{{ old('tanggal_akhir', $data['tanggal_akhir'] ?? '') }}"
                   required>
            @error('tanggal_akhir')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Hitung</button>
        </div>
    </form>

    @isset($total)
        <div class="alert alert-success">
            <h5>Total Pemasukan untuk Pegawai <strong>{{ $data['id_pegawai'] }}</strong></h5>
            Dari <strong>{{ $data['tanggal_mulai'] }}</strong> sampai <strong>{{ $data['tanggal_akhir'] }}</strong><br>
            <span class="fs-3">adalah Rp {{ number_format($total, 2, ',', '.') }}</span>
        </div>
    @endisset
</div>
@endsection
