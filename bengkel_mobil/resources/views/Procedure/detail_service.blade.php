@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Card for the Form and Result -->
    <div class="card shadow-sm" style="max-width: 600px; margin-left: 0; ">
        <div class="card-body">
            <h1 class="text-center fw-bold">Detail Service Transaksi</h1>
            <p class="text-center text-muted">Masukkan ID Transaksi untuk melihat detail layanan</p>

            <!-- Form Input ID Transaksi -->
            <form action="{{ route('procedure.detail_service') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="id_transaksi" class="form-label">ID Transaksi</label>
                    <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" placeholder="Masukkan ID Transaksi" value="{{ old('id_transaksi') }}" required>
                    @error('id_transaksi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Lihat Detail</button>
            </form>

            <!-- Menampilkan Detail Service jika sudah ada -->
            @if($detail)
                <div class="mt-4">
                    <h5 class="mb-3">Detail Transaksi:</h5>
                    <pre class="bg-light p-3 border rounded">{{ $detail }}</pre>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
