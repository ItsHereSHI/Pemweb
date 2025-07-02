@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h1 class="mb-4" style="text-align: left;">Data Transaksi</h1>

    <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table  id="Table" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $item)
                            <tr>
                                <td>{{ $item->ID_Transaksi }}</td>
                                <td>{{ $item->pelanggan->Nama_Pelanggan ?? '-' }}</td>
                                <td>{{ $item->Tanggal_Pembelian }}</td>
                                <td>Rp {{ number_format($item->Total_Biaya, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('transaksi.edit', $item->ID_Transaksi) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('transaksi.destroy', $item->ID_Transaksi) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
