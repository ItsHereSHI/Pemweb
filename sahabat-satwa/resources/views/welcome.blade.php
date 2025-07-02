<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Klinik Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .navbar-custom {
            background-color: #9E8C74;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #fff;
        }

        .header {
            background-color: #A4E8D1;
            color: #2F3D2F;
            padding: 100px 20px;
            text-align: center;
        }

        .dokter-section {
            background-color: #D0F0C0;
            padding: 40px 20px;
        }

        .dokter-card {
            background-color: #FAFDD6;
            border-radius: 10px;
            padding: 20px;
            color: #2F3D2F;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .dokter-card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-konsultasi {
            background-color: #9E8C74;
            color: #fff;
            border-radius: 20px;
        }

        footer {
            background-color: #9E8C74;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.login') }}">Klinik Hewan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="background-color: white;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#dokter-section">Dokter</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('pawrent.login') }}" class="btn btn-light">Login  </a></li>

            </ul>
        </div>
    </div>
</nav>

<!-- HEADER -->
<!-- HEADER -->
<div class="header">
    <div class="container">
        <h1 class="mb-4">Selamat Datang di Website Klinik Hewan</h1>
        <p class="lead mb-4">Kami menyediakan layanan kesehatan terbaik untuk hewan peliharaan Anda, dari konsultasi, pemeriksaan, hingga tindakan medis khusus.</p>
        <a href="#dokter-section" class="btn btn-light px-4 py-2 mb-5" style="border-radius: 20px;">Lihat Daftar Dokter</a>

        <!-- Layanan Unggulan -->
        <div class="row text-start">
            <div class="col-md-4 mb-4">
                <h4>🩺 Konsultasi Online</h4>
                <p>Konsultasikan kondisi hewan peliharaan Anda langsung dengan dokter hewan kami tanpa harus datang ke klinik.</p>
            </div>
            <div class="col-md-4 mb-4">
                <h4>🏥 Pemeriksaan Rutin</h4>
                <p>Pemeriksaan kesehatan rutin untuk memastikan hewan peliharaan Anda tetap sehat dan aktif setiap hari.</p>
            </div>
            <div class="col-md-4 mb-4">
                <h4>💊 Pemberian Vaksin</h4>
                <p>Berikan perlindungan maksimal dengan layanan vaksinasi terpercaya dan terjadwal.</p>
            </div>
        </div>

        <!-- Kenapa Memilih Kami -->
        <div class="mt-5">
            <h3 class="mb-3">Kenapa Memilih Klinik Kami?</h3>
            <ul class="list-unstyled">
                <li>✅ Dokter hewan profesional & berpengalaman</li>
                <li>✅ Layanan online & offline</li>
                <li>✅ Biaya terjangkau & transparan</li>
                <li>✅ Penjadwalan fleksibel & cepat</li>
            </ul>
        </div>

        <!-- Ajakan -->
        <div class="mt-5">
            <h4>Siap menjaga kesehatan hewan kesayangan Anda?</h4>
            <a href="#dokter-section" class="btn btn-outline-light mt-2 px-4 py-2" style="border-radius: 20px;">Mulai Konsultasi Sekarang</a>
        </div>
    </div>
</div>


<!-- DOKTER SECTION -->
<div id="dokter-section" class="dokter-section">
    <div class="container">
        <h2 class="text-center mb-4" style="color: #9E8C74;">Daftar Dokter </h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @foreach($dokterHewans as $dokterHewan)
                <div class="col-md-3 mb-4">
                    <div class="dokter-card">
                        <div class="text-center mb-3">
                            @if($dokterHewan->image)
                                <img src="{{ asset('storage/' . $dokterHewan->image) }}" alt="Foto Dokter" class="img-fluid" style="max-height: 120px; border-radius: 6px; object-fit: cover;">
                            @else
                                <p>Belum ada foto</p>
                            @endif
                        </div>
                        <p><strong>Nama:</strong> {{ $dokterHewan->nama_lengkap }}</p>
                        <p><strong>Spesialisasi:</strong> {{ $dokterHewan->spesialisasi }}</p>
                        <p><strong>Rating:</strong> {{ $dokterHewan->rating }}</p>
                        <div class="text-center mt-3">
                            <a href="{{ route('pawrent.login', ['id_dokter' => $dokterHewan->id_dokter]) }}" class="btn btn-konsultasi btn-sm">
                                <i class="fas fa-comments"></i> Konsultasi
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($dokterHewans->isEmpty())
            <div class="text-center text-muted">Belum ada data dokter hewan.</div>
        @endif
    </div>
</div>

<!-- FOOTER -->
<footer>
    <p>&copy; {{ date('Y') }} Klinik Hewan. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
