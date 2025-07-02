@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h2 class="mb-4" style="text-align: left;">Tambah Service</h2>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            <form method="POST" action="{{ route('service.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Service:</label>
                    <input type="text" name="Nama_Service" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lama Pengerjaan (HH:MM:SS):</label>
                    <input type="time" name="Lama_Pengerjaan" step="1" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga:</label>
                    <input type="number" name="Harga" step="0.01" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
