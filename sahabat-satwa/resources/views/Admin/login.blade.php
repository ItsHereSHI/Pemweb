<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- Menyertakan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('{{ asset('storage/bg.jpg') }}'); /* Pastikan gambar ada di path yang benar */
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
        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            position: relative;
            z-index: 1;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8em;
        }
        .login-container .form-control {
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .login-container button {
            width: 100%;
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px;
            border-radius: 5px;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
        .headline {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 2.5em;
            font-weight: bold;
            z-index: 1;
        }
        /* Posisi tombol login di sudut kanan atas */
        .login-buttons {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 2;
        }
        .login-buttons .btn {
            margin-left: 5px;
        }
    </style>
</head>
<body>

    <!-- Overlay gelap agar teks dan form lebih jelas -->
    <div class="overlay"></div>

    <!-- Teks "SAHABAT SATWA" di atas -->
    <div class="headline">SAHABAT SATWA</div>

    <!-- Tombol untuk memilih login sebagai Pawrent atau Dokter -->
    <div class="login-buttons">
        <a href="{{ route('dokterhewan.login') }}" class="btn btn-light">Login sebagai Dokter</a>
    </div>

    <!-- Form login di tengah -->
    <div class="login-container">
        <h2>Login</h2>

        <!-- Pesan error -->
        @if(session('error'))
            <div class="error-message">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <!-- Form login -->
        <form method="POST" action="{{ route('login.process') }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <!-- Menyertakan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
