@extends('layouts.app')

@section('title', 'Dashboard Sahabat Satwa')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4 text-white">Dashboard Sahabat Satwa</h1>

    <!--  Statistik -->
    <div class="row mt-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pemilik</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPawrent }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Hewan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalHewan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paw fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Total Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAdmin }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-shield fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Kunjungan Bulan Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kunjunganBulanIni }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Dokter</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalDokter }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-md fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik dan Tabel -->
    <div class="row">
        <!-- Pie Chart Jenis Hewan -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Distribusi Jenis Hewan</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="jenisHewanChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        @foreach($jenisHewan as $jenis)
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color: {{ $loop->index % 2 == 0 ? '#4e73df' : '#1cc88a' }}"></i> {{ $jenis->jenis_hewan }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aktivitas Terbaru</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Aksi</th>
                                    <th>Timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($logsTerbaru as $log)
                                    <tr>
                                        <td>{{ $log->user }}</td> <!-- Menampilkan user -->
                                        <td>{{ $log->action }}</td> <!-- Menampilkan aksi -->
                                        <td>{{ \Carbon\Carbon::parse($log->timestamp)->format('d M Y H:i') }}</td> <!-- Menampilkan timestamp dengan format -->
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Tidak ada aktivitas terbaru.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <!-- Kunjungan Terbaru -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kunjungan Terbaru</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Hewan</th>
                                    <th>Dokter</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kunjunganTerbaru as $kunjungan)
                                <tr>
                                    <td>
                                        @if($kunjungan->tanggal_kunjungan instanceof \Carbon\Carbon)
                                            {{ $kunjungan->tanggal_kunjungan->format('d M Y') }}
                                        @else
                                            {{ $kunjungan->tanggal_kunjungan }}
                                        @endif
                                    </td>


                                    <td>{{ $kunjungan->hewan->nama_hewan }}</td>
                                    <td>Dr. {{ $kunjungan->dokterHewan->nama_lengkap }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Pie Chart Jenis Hewan
var ctx = document.getElementById("jenisHewanChart");
var jenisHewanChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [
            @foreach($jenisHewan as $jenis)
                "{{ $jenis->jenis_hewan }}",
            @endforeach
        ],
        datasets: [{
            data: [
                @foreach($jenisHewan as $jenis)
                    {{ $jenis->total }},
                @endforeach
            ],
            backgroundColor: [
                @foreach($jenisHewan as $jenis)
                    "{{ $loop->index % 2 == 0 ? '#4e73df' : '#1cc88a' }}",
                @endforeach
            ],
            hoverBackgroundColor: [
                @foreach($jenisHewan as $jenis)
                    "{{ $loop->index % 2 == 0 ? '#2e59d9' : '#17a673' }}",
                @endforeach
            ],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: false
        },
        cutoutPercentage: 80,
    },
});
</script>
@endsection
