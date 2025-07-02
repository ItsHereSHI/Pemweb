@extends('layouts.app')

@section('title', 'Daftar Pemilik Hewan')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Pemilik Hewan</h5>
        <a href="{{ route('pawrents.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pemilik
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id=table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>No. Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pawrents as $pawrent)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pawrent->nama_lengkap }}</td>
                        <td>{{ $pawrent->no_telepon }}</td>
                        <td>
                            <a href="{{ route('pawrents.show', $pawrent->id_pawrent) }}" class="btn btn-sm btn-info" title="Lihat Detail">
                                <i class="fas fa-eye"></i> Lihat
                            </a>
                            <a href="{{ route('pawrents.edit', $pawrent->id_pawrent) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('pawrents.destroy', $pawrent->id_pawrent) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
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
