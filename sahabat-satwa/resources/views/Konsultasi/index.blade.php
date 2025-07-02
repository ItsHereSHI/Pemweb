@extends('layouts.dokters')

@section('title', 'Daftar Konsultasi Masuk')

@section('content')
<div class="container mt-4">
    <h3>Daftar Konsultasi dari Pawrent</h3>

    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    @if ($konsultasis->isEmpty())
        <p class="mt-3">Belum ada konsultasi masuk.</p>
    @else
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Nama Pawrent</th>
                    <th>Pesan</th>
                    <th>Status</th>

                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($konsultasis as $konsultasi)
                    <tr>
                        <td>{{ $konsultasi->pawrent->nama_lengkap }}</td>
                        <td>{{ Str::limit($konsultasi->pesan, 50) }}</td>
                        <td>
                            @if ($konsultasi->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif ($konsultasi->status == 'proses')
                                <span class="badge bg-primary">Proses</span>
                            @else
                                <span class="badge bg-success">Selesai</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('dokter.konsultasi.balas', $konsultasi->id) }}" class="btn btn-sm btn-info">Balas</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
