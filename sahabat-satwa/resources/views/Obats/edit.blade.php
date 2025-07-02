@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Obat</h5>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('obats.update', $obat->id_obat) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="{{ $obat->nama_obat }}" required>
            </div>
            <div class="mb-3">
                <label for="petunjuk_penggunaan" class="form-label">Petunjuk Penggunaan</label>
                <textarea class="form-control" id="petunjuk_penggunaan" name="petunjuk_penggunaan" rows="3" required>{{ $obat->petunjuk_penggunaan }}</textarea>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('obats.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
