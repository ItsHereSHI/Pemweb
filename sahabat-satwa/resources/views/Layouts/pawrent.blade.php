<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Menambahkan meta tag untuk responsivitas -->
    <title>PAWRENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            display: flex;
            background-image: url('{{ asset('storage/bg.jpg') }}'); /* Menambahkan background gambar */
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: rgba(52, 58, 64, 0.9); /* Transparansi untuk sidebar agar gambar tetap terlihat */
            padding-top: 20px;
            color: #fff;
            position: fixed; /* Sidebar tetap di kiri */
            top: 0;
            left: 0;
            transition: transform 0.3s ease; /* Menambahkan transisi animasi pada sidebar */
        }
        .sidebar a {
            color: #fff;
            display: block;
            padding: 15px 20px;
            text-decoration: none;
            font-size: 1.1rem;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 250px; /* Memberi ruang agar konten tidak tertutup sidebar */
        }
        h4 {
            text-align: center;
            color: #fff;
        }

        /* Menyembunyikan sidebar pada layar kecil */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-250px); /* Sembunyikan sidebar */
            }

            .sidebar.active {
                transform: translateX(0); /* Tampilkan sidebar ketika aktif */
            }

            .content {
                margin-left: 0; /* Memberi ruang penuh di layar kecil */
            }
        }

        /* Tombol untuk toggle sidebar */
        .sidebar-toggle {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 1.5rem;
            color: #fff;
            background: none;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Tombol untuk toggle sidebar di layar kecil -->
    <button class="sidebar-toggle" id="toggleSidebar">
        <i class="fas fa-bars"></i>
    </button>

    <div class="sidebar" id="sidebar">
        <h4>Sahabat Satwa</h4>
        <a href="{{ route('pawrents.dokterhewan') }}"><i class="fas fa-user-md"></i> Data Dokter</a>
        <a href="{{ route('pawrents.obat') }}"><i class="fas fa-paw"></i> Obat</a>
        <a href="{{ route('konsultasi.pawrent') }}"><i class="fas fa-paw"></i> Konsultasi saya</a>

        <a href="{{ route('pawrent.logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="content">
        @yield('content')
    </div>

    @yield('scripts')

    <script>
        // Script untuk toggle sidebar pada layar kecil
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>
