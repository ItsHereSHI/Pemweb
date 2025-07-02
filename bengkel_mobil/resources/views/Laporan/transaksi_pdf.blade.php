<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 5px; text-align: left; }
        h3 { text-align: center; }
    </style>
</head>
<body>
    <h3>Laporan Transaksi</h3>

    <table>
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>Pegawai</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $t)
            <tr>
                <td>{{ $t->ID_Transaksi }}</td>
                <td>{{ $t->pelanggan->Nama_Pelanggan ?? '-' }}</td>
                <td>{{ $t->Tanggal_Pembelian }}</td>
                <td>{{ $t->pegawai->Nama_Pegawai ?? '-' }}</td>
                <td>{{ number_format($t->Total_Biaya, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
