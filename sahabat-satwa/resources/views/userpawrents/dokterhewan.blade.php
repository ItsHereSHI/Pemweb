@extends('layouts.pawrent')

@section('title', 'Daftar Dokter Hewan')

@section('content')
<div class="container" style="max-width: 1200px;">
    <div class="card">
        <div class="card-header bg-white text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0 text-black">Daftar Dokter Hewan</h4>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                @foreach ($dokterHewans as $dokterHewan)
                    <div class="col-md-4 mb-4">
                        <!-- Membungkus card dengan link -->
                        <a href="{{ route('pawrents.dokterhewan.show', $dokterHewan->id_dokter) }}" class="card-link">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Gambar Dokter -->
                                    <div class="text-center mb-3">
                                        @if ($dokterHewan->image)
                                            <img src="{{ asset('storage/' . $dokterHewan->image) }}" alt="Foto Dokter" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                                        @else
                                            <p>Belum ada foto</p>
                                        @endif
                                    </div>

                                    <!-- Data Dokter -->
                                    <div class="dokter-info">
                                        <p><strong>Nama Lengkap:</strong> {{ $dokterHewan->nama_lengkap }}</p>
                                        <p><strong>No Telepon:</strong> {{ $dokterHewan->no_telepon }}</p>
                                        <p><strong>Tanggal Mulai Bekerja:</strong> {{ \Carbon\Carbon::parse($dokterHewan->tanggal_mulai_bekerja)->format('d-m-Y') }}</p>
                                        <p><strong>Klinik Tetap:</strong> {{ $dokterHewan->klinik->nama_klinik }}</p>
                                        <p><strong>Bidang Spesialisasi:</strong> {{ $dokterHewan->spesialisasi }}</p>
                                        <p><strong>Rating:</strong> {{ $dokterHewan->rating }}</p>
                                    </div>

                                    <div class="text-center mt-3">
                                        <a href="{{ route('konsultasi.create', ['id_dokter' => $dokterHewan->id_dokter]) }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-comments"></i> Konsultasi
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            @if($dokterHewans->isEmpty())
                <div class="text-center text-muted">Belum ada data dokter hewan.</div>
            @endif
        </div>
    </div>
</div>

<style>
    .dokter-info p {
        margin: 0;
        padding: 0;
        line-height: 1.6;
    }

    .dokter-info p strong {
        display: inline-block;
        width: 220px;
        text-align: left;
    }

    .dokter-info p {
        margin-bottom: 10px;
    }

    .dokter-info img {
        max-width: 100%;
        height: auto;
    }

    /* Penataan Galeri */
    .card {
        border: 1px solid #ddd;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        transition: transform 0.3s ease;
        min-height: 500px; /* Menetapkan tinggi tetap untuk card */
    }

    .card-body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .btn {
        width: 100%;
    }

    .card-link {
        text-decoration: none;
        color: inherit;
    }

    /* Efek hover pada card */
    .card:hover {
        transform: scale(1.05);
    }

    .text-primary {
        text-decoration: underline;
        cursor: pointer;
    }

    .text-primary:hover {
        color: #0056b3;
    }
</style>
@endsection
