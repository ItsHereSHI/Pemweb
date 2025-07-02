<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman HOME</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
        }
        header {
            background-color: #343a40;
            color: white;
            padding: 15px;
            text-align: center;
            width: 100%;
        }
        main {
            padding: 20px;
            text-align: center;
            flex: 1;
        }
        footer {
            background-color: #343a40;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
        }
        .sidebar {
            width: 200px;
            background-color: #343a40;
            color: white;
            padding: 15px;
            position: fixed;
            height: 100%;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>
    <header>
        <h1>Selamat Datang di Aplikasi Portofolio</h1>
    </header>
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="#">Home</a>
        <a href="{{ route('login') }}">Login</a> <!-- Ganti dengan URL login yang sesuai -->
    </div>
    <main>
        <h2>Halaman Utama</h2>
        <p>Ini adalah halaman HOME dari aplikasi Anda.</p>
    </main>
    <footer>
        <p>&copy; 2024 Aplikasi Portofolio</p>
    </footer>
</body>
</html>
