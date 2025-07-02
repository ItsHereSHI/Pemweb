<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Pawrent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('{{ asset('storage/bg.jpg') }}');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
        }
        .register-container {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 1;
        }
        .register-container h3 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8em;
        }
        .register-container .form-control {
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .register-container button {
            width: 100%;
            background-color: #00ff9d;
            border-color: #15fab1;
            padding: 10px;
            border-radius: 5px;
        }
        .headline {
            position: absolute;
            top: 15%;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 2.5em;
            font-weight: bold;
            z-index: 1;
        }
        .back-button {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 2;
        }
    </style>
</head>
<body>

    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Tombol Back -->
    <div class="back-button">
        <a href="{{ url('/login/pawrent') }}" class="btn btn-light">← Kembali</a>
    </div>

    <!-- Judul -->


    <!-- Form Registrasi -->
    <div class="register-container">
        <h3>Registrasi Pawrent</h3>
        <form method="POST" action="{{ url('/register/pawrent') }}">
            @csrf

            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <input type="text" name="no_telepon" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>

</body>
</html>
