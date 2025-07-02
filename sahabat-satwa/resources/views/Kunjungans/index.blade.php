@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Kunjungan</h5>
        <div>
            <a href="{{ route('kunjungan.lengkap') }}" class="btn btn-success me-2">
                <i class="fas fa-table"></i> Lihat Kunjungan Lengkap
            </a>
            <a href="{{ route('kunjungans.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Kunjungan
            </a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success mb-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table id=table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Kunjungan</th>
                        <th>ID Hewan</th>


                        <th>ID Dokter</th>
                        <th>Deskripsi</th>
                        <th>ID Kunjungan Sebelumnya</th>

                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kunjungans as $kunjungan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kunjungan->tanggal_kunjungan }}</td>
                        <td>{{ $kunjungan->id_hewan }}</td>

                        <td>{{ $kunjungan->id_dokter }}</td>
                        <td>{{ $kunjungan->deskripsi }}</td>
                        <td>{{ $kunjungan->id_kunjungan_sebelumnya ?? 'Tidak ada' }}</td>
                        <td>
                            <a href="{{ route('kunjungans.show', $kunjungan) }}" class="btn btn-info btn-sm" title="Lihat Detail">
                                <i class="fas fa-eye"></i> Lihat
                            </a>
                            <a href="{{ route('kunjungans.edit', $kunjungan) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('kunjungans.destroy', $kunjungan) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
