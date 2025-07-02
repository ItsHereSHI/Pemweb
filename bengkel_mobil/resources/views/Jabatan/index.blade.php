@extends('layouts.app')

@section('content')
<div class="container p-0"> <!-- Menghilangkan padding pada container -->
    <h1 class="mb-4 text-Left">Daftar Jabatan</h1>

    <a href="{{ route('jabatan.create') }}" class="btn btn-primary mb-3">Tambah Jabatan</a>


    <div class="card shadow-sm" style="width: 60%; margin:left auto;">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table id="Table" class="table table-bordered table-striped text-center" style="table-layout: fixed; width:100%;">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nama Jabatan</th>
                        <th class="text-center">Gaji</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jabatans as $jabatan)
                        <tr>
                            <td class="text-center">{{ $jabatan->ID_Jabatan }}</td>
                            <td class="text-center">{{ $jabatan->Nama_Jabatan }}</td>
                            <td class="text-center">{{ number_format($jabatan->Gaji, 2) }}</td>
                            <td class="text-center">
                                <a href="{{ route('jabatan.edit', $jabatan->ID_Jabatan) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('jabatan.destroy', $jabatan->ID_Jabatan) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
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
