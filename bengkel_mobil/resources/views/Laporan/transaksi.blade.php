@extends('layouts.app')

@section('content')
<div class="container py-4 margin-left:0; ">
    <h3>Laporan Transaksi</h3>

    <form method="GET" action="{{ route('laporan.transaksi') }}" class="row g-3 mb-3">
        <div class="col-md-3">
            <label>Dari Tanggal</label>
            <input type="date" name="tanggal_awal" class="form-control" value="{{ request('tanggal_awal') }}">
        </div>
        <div class="col-md-3">
            <label>Sampai Tanggal</label>
            <input type="date" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}">
        </div>
        <div class="col-md-3">
            <label>Pegawai</label>
            <select name="pegawai_id" class="form-control">
                <option value="">-- Semua --</option>
                @foreach ($pegawai as $p)
                    <option value="{{ $p->ID_Pegawai }}" {{ request('pegawai_id') == $p->ID_Pegawai ? 'selected' : '' }}>{{ $p->Nama_Pegawai }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-primary me-2">Filter</button>
            <a href="{{ route('laporan.transaksi.cetak', request()->all()) }}" class="btn btn-danger" target="_blank">Cetak PDF</a>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>Pegawai</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $t)
            <tr>
                <td>{{ $t->ID_Transaksi }}</td>
                <td>{{ $t->pelanggan->Nama_Pelanggan ?? '-' }}</td>
                <td>{{ $t->Tanggal_Pembelian }}</td>
                <td>{{ $t->pegawai->Nama_Pegawai ?? '-' }}</td>
                <td>{{ number_format($t->Total_Biaya, 2) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
