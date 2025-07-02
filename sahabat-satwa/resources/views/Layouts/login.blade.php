<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sahabat Satwa')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('{{ asset('storage/bg.jpg') }}');
            background-size: cover;
            background-position: center;
            backdrop-filter: blur(3px);
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
            height: 100vh;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        .navbar {
            z-index: 3;
        }
        .navbar-nav .nav-item .btn {
            margin-left: 10px;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-relative">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SAHABAT SATWA</a>
            <div class="d-flex ms-auto">
                <a href="{{ route('pawrent.login') }}" class="btn btn-outline-light">Login Pawrent</a>
                <a href="{{ route('dokterhewan.login') }}" class="btn btn-outline-light">Login Dokter</a>
                <a href="{{ route('admin.login') }}" class="btn btn-outline-light">Login Admin</a>
            </div>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
