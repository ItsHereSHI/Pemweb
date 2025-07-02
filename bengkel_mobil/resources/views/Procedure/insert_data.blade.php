@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">📊 Form Insert Data</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Wrapper dengan Grid 2 Kolom -->
    <form method="POST" action="{{ route('insertdata') }}">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
            </div>

            <div class="col-md-6">
                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="alamat_pegawai" class="form-label">Alamat Pegawai</label>
                <textarea class="form-control" id="alamat_pegawai" name="alamat_pegawai" required></textarea>
            </div>

            <div class="col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="col-md-6">
                <label for="id_jabatan" class="form-label">ID Jabatan</label>
                <input type="number" class="form-control" id="id_jabatan" name="id_jabatan" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nama_sparepart" class="form-label">Nama Sparepart</label>
                <input type="text" class="form-control" id="nama_sparepart" name="nama_sparepart" required>
            </div>

            <div class="col-md-6">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="jenis_sparepart" class="form-label">Jenis Sparepart</label>
                <input type="text" class="form-control" id="jenis_sparepart" name="jenis_sparepart" required>
            </div>

            <div class="col-md-6">
                <label for="harga_sparepart" class="form-label">Harga Sparepart</label>
                <input type="number" step="0.01" class="form-control" id="harga_sparepart" name="harga_sparepart" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian</label>
                <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" required>
            </div>

            <div class="col-md-6">
                <label for="total_biaya" class="form-label">Total Biaya</label>
                <input type="number" step="0.01" class="form-control" id="total_biaya" name="total_biaya" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@section('styles')
<style>
    /* Styling form untuk kolom dua */
    .row {
        margin-bottom: 20px; /* Menambahkan jarak antar baris form */
    }

    .col-md-6 {
        margin-bottom: 15px; /* Memberikan jarak antar input dalam kolom */
    }

    .form-label {
        font-weight: bold; /* Memberikan font tebal pada label */
    }

    /* Styling untuk button agar lebih jelas */
    button {
        margin-top: 20px;
    }
</style>
@endsection
