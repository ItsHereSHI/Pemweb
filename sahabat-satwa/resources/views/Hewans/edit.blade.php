<!-- resources/views/hewans/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Hewan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Hewan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('hewans.update', $hewan->id_hewan) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_hewan">Nama Hewan</label>
                <input type="text" class="form-control @error('nama_hewan') is-invalid @enderror" name="nama_hewan" value="{{ old('nama_hewan', $hewan->nama_hewan) }}" required>
                @error('nama_hewan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tahun_lahir">Tahun Lahir</label>
                <input type="date" class="form-control @error('tahun_lahir') is-invalid @enderror" name="tahun_lahir" value="{{ old('tahun_lahir', $hewan->tahun_lahir) }}" required>
                @error('tahun_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jenis_hewan">Jenis Hewan</label>
                <input type="text" class="form-control @error('jenis_hewan') is-invalid @enderror" name="jenis_hewan" value="{{ old('jenis_hewan', $hewan->jenis_hewan) }}" required>
                @error('jenis_hewan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="id_pawrent">Pemilik Hewan</label>
                <select class="form-control @error('id_pawrent') is-invalid @enderror" name="id_pawrent" required>
                    <option value="">Pilih Pemilik</option>
                    @foreach($pawrents as $pawrent)
                        <option value="{{ $pawrent->id_pawrent }}" {{ $hewan->id_pawrent == $pawrent->id_pawrent ? 'selected' : '' }}>{{ $pawrent->nama_lengkap }}</option>
                    @endforeach
                </select>
                @error('id_pawrent')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning">Update Hewan</button>
        </form>
    </div>
</div>
@endsection
