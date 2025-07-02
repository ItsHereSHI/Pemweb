@extends('layouts.app')

@section('content')
<style>
    .dashboard-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .dashboard-wrapper {
        max-width: 70%;
        margin-left: 0;
    }

    .scroll-container {
        max-height: 80vh;
        overflow-y: auto;
        padding-right: 10px;
    }


    .scroll-container::-webkit-scrollbar {
        width: 6px;
    }

    .scroll-container::-webkit-scrollbar-thumb {
        background-color: #4e73df;
        border-radius: 10px;
    }


    .dashboard-card .card-body {
        padding: 30px 20px;

        border-radius: 8px;
    }


    .dashboard-card .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        text-transform: uppercase;
    }

    .dashboard-card .card-text {
        font-size: 2rem;
        font-weight: 500;
    }

    /* Kartu dengan warna manual */
    .bg-header-transaksi { background-color: #4e73df !important; } /* Blue */
    .bg-jabatan { background-color: #1cc88a !important; } /* Green */
    .bg-nomor-pegawai { background-color: #36b9cc !important; } /* Teal */
    .bg-pegawai { background-color: #f6c23e !important; } /* Yellow */
    .bg-pelanggan { background-color: #e74a3b !important; } /* Red */
    .bg-pembelian-service { background-color: #f8d7da !important; } /* Light Red */
    .bg-pembelian-sparepart { background-color: #5a6268 !important; } /* Gray */
    .bg-service { background-color: #28a745 !important; } /* Success Green */
    .bg-sparepart { background-color: #d39e00 !important; } /* Orange */
    .bg-transaksi { background-color: #007bff !important; } /* Blue */
</style>

<div class="container dashboard-wrapper py-4">
    <h2 class="mb-4">📊 Dashboard Statistik</h2>
    <div class="d-flex flex-wrap gap-2 mb-4">
        <a href="{{ route('procedure.index') }}" class="btn btn-primary">Procedure & Function</a>
        <a href="{{ route('view') }}" class="btn btn-success">View</a>
        <a href="{{ route('laporan.transaksi') }}" class="btn btn-warning">Laporan</a>
    </div>

    <div class="scroll-container">
        <div class="row g-4">
            @php
                $data = [
                    'Header Transaksi' => $headerTransaksi,
                    'Jabatan' => $jabatan,
                    'Nomor Pegawai' => $nomorPegawai,
                    'Pegawai' => $pegawai,
                    'Pelanggan' => $pelanggan,
                    'Pembelian Service' => $pembelianService,
                    'Pembelian Sparepart' => $pembelianSparepart,
                    'Service' => $service,
                    'Sparepart' => $sparepart,
                    'Transaksi' => $transaksi
                ];


                $links = [
                    'Header Transaksi' => route('header_transaksi.index'),
                    'Jabatan' => route('jabatan.index'),
                    'Nomor Pegawai' => route('nomor_pegawai.index'),
                    'Pegawai' => route('pegawai.index'),
                    'Pelanggan' => route('pelanggan.index'),
                    'Pembelian Service' => route('pembelian_service.index'),
                    'Pembelian Sparepart' => route('pembelian_sparepart.index'),
                    'Service' => route('service.index'),
                    'Sparepart' => route('sparepart.index'),
                    'Transaksi' => route('transaksi.index')
                ];
            @endphp

            @foreach ($data as $label => $jumlah)
                @php
                    // Tentukan warna untuk setiap label
                    $colorClass = 'bg-' . strtolower(str_replace(' ', '-', $label));
                    $link = $links[$label];
                @endphp
                <div class="col-md-6">
                    <a href="{{ $link }}" class="text-decoration-none">
                        <div class="card {{ $colorClass }} text-white dashboard-card shadow-sm rounded">
                            <div class="card-body">
                                <h5 class="card-title">{{ $label }}</h5>
                                <h3 class="card-text">{{ $jumlah }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
