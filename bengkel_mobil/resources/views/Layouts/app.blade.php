<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manajemen Bengkel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Menambahkan Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Styling untuk sidebar */

        html, body {
    height: 100%;
    overflow: hidden;
}

.content-area {
    margin-left: 250px;
    padding: 20px;
    padding-top: 30px;
    height: 100vh;
    overflow: hidden; /* Tidak bisa discroll sama sekali */
    box-sizing: border-box;
}

        .sidebar {
            background-color: #343a40;
            color: #fff;
            height: 100vh;
            position: fixed;
            width: 250px;
            padding-top: 30px;
            transition: width 0.3s ease;
            z-index: 1000; /* Membuat sidebar selalu di depan */
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 15px 20px;
            display: block;
            font-size: 16px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #007bff;
            transform: scale(1.05);
        }

        .sidebar a i {
            margin-right: 10px;
        }

        /* Content Area */
        .content-area {
            margin-left: 250px;
            padding: 20px;
            padding-top: 30px; /* Menambahkan padding top untuk menghindari konten terhalang header */
            min-height: 100vh; /* Agar konten area bisa mengisi seluruh layar */
        }

        /* Mengatur ikon pada sidebar */
        .sidebar i {
            font-size: 18px;
        }

        /* Responsive Design: Sidebar menutup di layar kecil */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
                padding-top: 20px;
            }

            .content-area {
                margin-left: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="sidebar">
                <h4 class="text-center mb-3">
                    <a href="{{ route('dashboard') }}"
                       class="text-white text-decoration-none">
                      Manajemen Bengkel
                    </a>
                  </h4>

                <a href="{{ route('header_transaksi.index') }}"><i class="fas fa-cogs"></i>Header Transaksi</a>
                <a href="{{ route('jabatan.index') }}"><i class="fas fa-briefcase"></i>Jabatan</a>
                <a href="{{ route('nomor_pegawai.index') }}"><i class="fas fa-phone"></i>Nomor Pegawai</a>
                <a href="{{ route('pegawai.index') }}"><i class="fas fa-id-badge"></i>Pegawai</a>
                <a href="{{ route('pelanggan.index') }}"><i class="fas fa-users"></i>Pelanggan</a>
                <a href="{{ route('pembelian_service.index') }}"><i class="fas fa-cart-plus"></i>Pembelian Service</a>
                <a href="{{ route('pembelian_sparepart.index') }}"><i class="fas fa-box"></i>Pembelian Sparepart</a>
                <a href="{{ route('service.index') }}"><i class="fas fa-concierge-bell"></i>Service</a>
                <a href="{{ route('sparepart.index') }}"><i class="fas fa-cogs"></i>Sparepart</a>
                <a href="{{ route('transaksi.index') }}"><i class="fas fa-file-invoice"></i>Transaksi</a>




            </div>

            <!-- Main Content -->
            <div class="content-area">
                @yield('content')
            </div>
        </div>
    </div>

<!-- Sertakan jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Sertakan DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- Sertakan DataTables Bootstrap 5 JS (jika menggunakan Bootstrap 5) -->
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#Table').DataTable({
            responsive: true,
            processing: true,
            columnDefs: [
                { orderable: false, targets: 0 } // Kolom pertama (No) tidak dapat diurutkan
            ],
            order: [[1, 'asc']] // Urutkan berdasarkan kolom kedua (ID) secara ascending
        });
    });
</script>

</body>
</html>
