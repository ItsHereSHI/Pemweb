@extends('layouts.app')

@section('title', 'Detail Klinik')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Detail Klinik</h5>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <h6>Informasi Klinik</h6>
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Klinik</th>
                        <td>{{ $klinik->nama_klinik }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $klinik->alamat }}</td>
                    </tr>
                    <tr>
                        <th>No. Telepon</th>
                        <td>{{ $klinik->no_telepon }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h6>Aksi</h6>
                <div class="d-flex gap-2">
                    <a href="{{ route('kliniks.edit', $klinik->id_klinik) }}" class="btn btn-warning flex-grow-1">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('kliniks.destroy', $klinik->id_klinik) }}" method="POST" class="flex-grow-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Apakah Anda yakin?')">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>
@endsection