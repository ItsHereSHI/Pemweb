@extends('layouts.app')

@section('title', 'Transaksi per Pelanggan')

@section('content')
    <div class="container mt-4">
        <h1>Data Transaksi per Pelanggan</h1>

        <table class="table table-bordered mt-3">
            <thead class="table-light">
                <tr>
                    <th>ID Transaksi</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Pembelian</th>
                    <th>Total Biaya</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $item)
                    <tr>
                        <td>{{ $item->ID_Transaksi }}</td>
                        <td>{{ $item->Nama_Pelanggan }}</td>
                        <td>{{ $item->Tanggal_Pembelian }}</td>
                        <td>Rp {{ number_format($item->Total_Biaya, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
