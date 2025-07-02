@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h2 class="mb-4" style="text-align: left;">Daftar Pembelian Sparepart</h2>



    <div class="mb-3">
        <a href="{{ route('pembelian_sparepart.create') }}" class="btn btn-primary">Tambah Pembelian Sparepart</a>
    </div>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table  id="Table" class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Transaksi</th>
                        <th>Sparepart</th>
                        <th>Jumlah Beli</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $d->ID_Pembelian_Sparepart }}</td>
                        <td>{{ $d->transaksi->ID_Transaksi }}</td>
                        <td>{{ $d->sparepart->Nama_Sparepart }}</td>
                        <td>{{ $d->Jumlah_Beli }}</td>
                        <td>
                            <a href="{{ route('pembelian_sparepart.edit', $d->ID_Pembelian_Sparepart) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('pembelian_sparepart.destroy', $d->ID_Pembelian_Sparepart) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
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
