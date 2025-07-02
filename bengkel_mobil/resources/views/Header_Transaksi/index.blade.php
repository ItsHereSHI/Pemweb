@extends('layouts.app')

@section('content')
<h2>Daftar Header Transaksi</h2>
<a href="{{ route('header_transaksi.create') }}" class="btn btn-primary mb-3">Tambah Header</a>


<div class="card shadow-sm" style="width: 60%; margin:left auto;">
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
        <table  id="Table" class="table table-bordered table-striped text-center" style="table-layout: fixed; width:100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pegawai</th>
                    <th>Transaksi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($header as $h)
                <tr>
                    <td>{{ $h->ID_Header }}</td>
                    <td>{{ $h->pegawai->Nama_Pegawai ?? 'Tidak ditemukan' }}</td>
                    <td>{{ $h->transaksi->ID_Transaksi ?? 'Tidak ditemukan' }}</td>
                    <td>
                        <a href="{{ route('header_transaksi.edit', $h->ID_Header) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('header_transaksi.destroy', $h->ID_Header) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
