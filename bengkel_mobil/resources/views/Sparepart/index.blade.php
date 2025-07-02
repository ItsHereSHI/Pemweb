@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h2 class="mb-4" style="text-align: left;">Daftar Sparepart</h2>



    <div class="mb-3">
        <a href="{{ route('sparepart.create') }}" class="btn btn-primary">Tambah Sparepart</a>
    </div>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table id="Table"  class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama Sparepart</th>
                        <th>Stok</th>
                        <th>Jenis Sparepart</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $d->ID_Sparepart }}</td>
                        <td>{{ $d->Nama_Sparepart }}</td>
                        <td>{{ $d->Stok }}</td>
                        <td>{{ $d->Jenis_Sparepart }}</td>
                        <td>{{ $d->Harga }}</td>
                        <td>
                            <a href="{{ route('sparepart.edit', $d->ID_Sparepart) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('sparepart.destroy', $d->ID_Sparepart) }}" method="POST" style="display:inline;">
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
