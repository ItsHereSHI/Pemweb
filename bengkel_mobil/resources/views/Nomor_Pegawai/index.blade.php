@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h1 class="mb-4" style="text-align: left;">Daftar Nomor Pegawai</h1>

    <a href="{{ route('nomor_pegawai.create') }}" class="btn btn-primary mb-3">Tambah Nomor</a>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table id="Table"  class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pegawai</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nomorPegawai as $nomor)
                        <tr>
                            <td>{{ $nomor->ID_Nomor }}</td>
                            <td>{{ $nomor->pegawai->Nama_Pegawai }}</td>
                            <td>{{ $nomor->No_Tlp }}</td>
                            <td>
                                <a href="{{ route('nomor_pegawai.edit', $nomor->ID_Nomor) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('nomor_pegawai.destroy', $nomor->ID_Nomor) }}" method="POST" style="display:inline;">
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
