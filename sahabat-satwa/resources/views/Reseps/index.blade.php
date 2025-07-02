@extends('layouts.app')

@section('title', 'Daftar Resep')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Resep</h5>
            <a href="{{ route('reseps.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Resep
            </a>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table id="Ttable" class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>ID Kunjungan</th>
                            <th>Nama Obat</th>
                            <th>Dosis</th>
                            <th>Frekuensi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reseps as $resep)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $resep->kunjungan->id_kunjungan ?? '-' }}</td>
                            <td>{{ $resep->obat->nama_obat ?? '-' }}</td>
                            <td>{{ $resep->dosis }}</td>
                            <td>{{ $resep->frekuensi }}</td>
                            <td class="d-flex"
                                    ><a href="{{ route('reseps.show', $resep->id_resep) }}" class="btn btn-info btn-sm me-2" title="Lihat Detail">
                                        <i class="fas fa-eye"></i> Detail Resep
                                    </a>
                                    <a href="{{ route('reseps.edit', $resep->id_resep) }}" class="btn btn-warning btn-sm me-2" title="Edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('reseps.destroy', $resep->id_resep) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data resep.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
