@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h1 class="mb-4" style="text-align: left;">Daftar Pembelian Service</h1>

    <a href="{{ route('pembelian_service.create') }}" class="btn btn-primary mb-3">Tambah Pembelian</a>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table  id="Table" class="table table-bordered table-striped text-center">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Transaksi</th>
                        <th>Pegawai</th>
                        <th>Service</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $d->ID_Pembelian_Service }}</td>
                        <td>{{ $d->transaksi->ID_Transaksi ?? '-' }}</td>
                        <td>{{ $d->pegawai->Nama_Pegawai ?? '-' }}</td>
                        <td>{{ $d->service->Nama_Service ?? '-' }}</td>
                        <td>
                            <a href="{{ route('pembelian_service.edit', $d->ID_Pembelian_Service) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pembelian_service.destroy', $d->ID_Pembelian_Service) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
