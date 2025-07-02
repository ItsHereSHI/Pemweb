<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h2>Dashboard Admin</h2>
        <p>Selamat datang, {{ Auth::guard('admin')->user()->username }}!</p>

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <!-- Tambahkan konten dashboard admin di sini -->
    </div>
</body>
</html>
