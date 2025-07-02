@extends('layouts.app')

@section('title', 'Pemasukan Service Pegawai')

@section('content')
    <div class="container mt-4">
        <h1>Data Pemasukan Service Pegawai</h1>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th>Total Pemasukan Service</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemasukan as $item)
                    <tr>
                        <td>{{ $item->ID_Pegawai }}</td>
                        <td>{{ $item->Nama_Pegawai }}</td>
                        <td>{{ number_format($item->Total_Pemasukan_Service, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
