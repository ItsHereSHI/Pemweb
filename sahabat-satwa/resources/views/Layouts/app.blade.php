<!DOCTYPE html>
<html lang="id">
<head>
    <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <meta charset="UTF-8">
    <title>ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom,
                #1989A6 0%,
                #08A89D 40%,
                #FBEC5D 80%,
                #F5F5F5 100%);
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #1989A6;
            padding-top: 20px;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .sidebar a {
            color: #fff;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .sidebar a:hover {
            background-color: #08A89D;
        }

        .content {
            flex-grow: 1;
            padding: 30px;
            margin-left: 250px;
            background-color: transparent;
            position: relative;
        }

        .background-text {
            position: absolute;
            bottom: 100px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 88px;
            font-weight: bold;
            color: rgba(0, 0, 0, 0.3);
            white-space: nowrap;
            pointer-events: none;
            user-select: none;
        }

        .btn-danger {
            background-color: #FBEC5D !important;
            color: #000 !important;
            border: none;
        }

        .btn-danger:hover {
            background-color: #f7e84f !important;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Sahabat Satwa</h4>
        <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ route('admin.index') }}"><i class="fas fa-users"></i> Admin</a>
        <a href="{{ route('kliniks.index') }}"><i class="fas fa-capsules"></i> Klinik</a>
        <a href="{{ route('dokter-hewans.index') }}"><i class="fas fa-user-md"></i> Data Dokter</a>
        <a href="{{ route('pawrents.index') }}"><i class="fas fa-users"></i> Data Pemilik</a>
        <a href="{{ route('hewans.index') }}"><i class="fas fa-paw"></i> Data Hewan</a>
        <a href="{{ route('reseps.index') }}"><i class="fas fa-bone"></i> Resep</a>
        <a href="{{ route('obats.index') }}"><i class="fas fa-capsules"></i> Obat</a>
        <a href="{{ route('kunjungans.index') }}"><i class="fas fa-calendar"></i> Kunjungan</a>
        <a href="{{ route('audit-logs.index') }}"><i class="fas fa-list-alt"></i> Log</a>
        <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="content">
        @yield('content')
        <div class="background-text">SAHABAT SATWA</div>
    </div>
<!-- jQuery & DataTables JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- Inisialisasi DataTables -->
<script>
    $(document).ready(function () {
        $('#table').DataTable({
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ entri",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                },
                "zeroRecords": "Tidak ditemukan data yang sesuai",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "infoFiltered": "(difilter dari _MAX_ total entri)"
            }
        });
    });
</script>

    @yield('scripts')
</body>
</html>
