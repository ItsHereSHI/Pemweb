@extends('layouts.app')

@section('title', 'Daftar Klinik')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Klinik</h5>
        <a href="{{ route('kliniks.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Klinik
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id=table class="table table-striped table-hover">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Klinik</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>

                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kliniks as $klinik)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $klinik->nama_klinik }}</td>
                        <td>{{ Str::limit($klinik->alamat, 30) }}</td>
                        <td>{{ $klinik->no_telepon }}</td>

                        <td>
                            <a href="{{ route('kliniks.show', $klinik->id_klinik) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                            <a href="{{ route('kliniks.edit', $klinik->id_klinik) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('kliniks.destroy', $klinik->id_klinik) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">
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
