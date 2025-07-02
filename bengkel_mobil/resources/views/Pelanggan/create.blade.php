@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h1 class="mb-4" style="text-align: left;">Tambah Pelanggan</h1>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Pelanggan</label>
                    <input type="text" name="Nama_Pelanggan" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
