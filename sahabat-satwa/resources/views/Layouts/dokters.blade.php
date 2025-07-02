<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>DOKTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            display: flex;
            background-image: url('{{ asset('storage/bg.jpg') }}'); /* Menambahkan background gambar */
            background-size: cover;
            background-position: center;
            height: 100vh; /* Pastikan halaman memenuhi tinggi viewport */
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
        }
        .sidebar a {
            color: #fff;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
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
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Sahabat Satwa</h4>

        <a href="{{ route('dokterhewans.pawrents') }}">
            <i class="fas fa-user-md"></i> Data Pawrents
        </a>

        <a href="{{ route('konsultasi.index') }}">
            <i class="fas fa-comments"></i> Konsultasi
        </a>

        <a href="{{ route('dokterhewans.logout') }}">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>



    <div class="content">
        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>
