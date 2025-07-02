@extends('layouts.app')

@section('title', 'Sparepart Terbanyak Dibeli')

@section('content')
    <div class="container mt-4">
        <h1>Data Sparepart Terbanyak Dibeli</h1>

        <table class="table table-bordered mt-3">
            <thead class="table-light">
                <tr>
                    <th>Nama Sparepart</th>
                    <th>Total Terbeli</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spareparts as $item)
                    <tr>
                        <td>{{ $item->Nama_Sparepart }}</td>
                        <td>{{ $item->Total_Terbeli }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
