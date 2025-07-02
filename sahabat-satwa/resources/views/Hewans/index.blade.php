@extends('layouts.app')

@section('title', 'Daftar Hewan')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Hewan Peliharaan</h5>
        <a href="{{ route('hewans.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Hewan
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id=table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Hewan</th>
                        <th>Jenis</th>
                        <th>Tahun Lahir</th>
                        <th>Umur</th>

                        <th>Pemilik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hewans as $hewan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $hewan->nama_hewan }}</td>
                        <td>{{ $hewan->jenis_hewan }}</td>
                        <td>{{ $hewan->tahun_lahir }}</td>
                        <td>{{ \Carbon\Carbon::parse($hewan->tahun_lahir)->age }} tahun</td>

                        <td>{{ $hewan->pawrent->nama_lengkap }}</td>
                        <td>
                            <a href="{{ route('hewans.show', $hewan->id_hewan) }}" class="btn btn-info btn-sm" title="Lihat Detail">
                                <i class="fas fa-eye"></i> Lihat
                            </a>
                            <a href="{{ route('hewans.edit', $hewan->id_hewan) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('hewans.destroy', $hewan->id_hewan) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
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
