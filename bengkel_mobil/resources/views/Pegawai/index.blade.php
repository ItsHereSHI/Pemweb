@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h1 class="mb-4" style="text-align: left;">Data Pegawai</h1>

    <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table  id="Table" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawai as $p)
                        <tr>
                            <td>{{ $p->ID_Pegawai }}</td>
                            <td>{{ $p->Nama_Pegawai }}</td>
                            <td>{{ $p->jabatan->Nama_Jabatan ?? '-' }}</td>
                            <td>{{ $p->Alamat }}</td>
                            <td>
                                <a href="{{ route('pegawai.edit', $p->ID_Pegawai) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pegawai.destroy', $p->ID_Pegawai) }}" method="POST" style="display:inline;">
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
@endsection
