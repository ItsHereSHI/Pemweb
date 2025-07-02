@extends('layouts.app')

@section('title', 'Daftar Dokter Hewan')

@section('content')
<div class="container" style="max-width: 1200px;">
    <div class="card">
        <div class="card-header bg-white text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0 text-black">Daftar Dokter Hewan</h4>
            <a href="{{ route('dokter-hewans.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Dokter Hewan
            </a>
        </div>
        <div class="card-body">
            <!-- Menampilkan pesan sukses -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel Daftar Dokter Hewan -->
            <div class="table-responsive">
                <table id=table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>No Telepon</th>
                            <th>Tanggal Mulai Bekerja</th>
                            <th>Klinik Tetap</th>
                            <th>Bidang Spesialisasi</th>
                            <th>Image</th>
                            <th>Aksi</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dokterHewans as $dokterHewan)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $dokterHewan->nama_lengkap }}</td>
                                <td>{{ $dokterHewan->no_telepon }}</td>
                                <td>{{ \Carbon\Carbon::parse($dokterHewan->tanggal_mulai_bekerja)->format('d-m-Y') }}</td>
                                <td>{{ $dokterHewan->klinik->nama_klinik }}</td>
                                <td>{{ $dokterHewan->spesialisasi}}</td>
                                <td>
                                @if ($dokterHewan->image)
                                <img src="{{ asset('storage/' . $dokterHewan->image) }}" alt="Foto Dokter" width="100">
                            @else
                                <p>Belum ada foto</p>
                            @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('dokter-hewans.show', $dokterHewan) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('dokter-hewans.edit', $dokterHewan) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('dokter-hewans.destroy', $dokterHewan) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($dokterHewans->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada data dokter hewan.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
