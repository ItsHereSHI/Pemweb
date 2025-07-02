@extends('layouts.app')

@section('title', 'Kunjungan Lengkap')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Kunjungan Lengkap</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-primary">
                        <tr class="text-center">
                            <th>ID Kunjungan</th>
                            <th>Nama Hewan</th>
                            <th>Jenis Hewan</th>
                            <th>Nama Pawrent</th>
                            <th>Nama Dokter</th>
                            <th>Nama Klinik</th>
                            <th>Tanggal Kunjungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $item->id_kunjungan }}</td>
                                <td>{{ $item->nama_hewan }}</td>
                                <td>{{ $item->jenis_hewan }}</td>
                                <td>{{ $item->nama_pawrent }}</td>
                                <td>{{ $item->nama_dokter }}</td>
                                <td>{{ $item->nama_klinik }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->format('d-m-Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Tidak ada data kunjungan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
