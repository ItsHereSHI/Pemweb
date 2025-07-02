@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h2 class="mb-4" style="text-align: left;">Tambah Pembelian Sparepart</h2>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            <form method="POST" action="{{ route('pembelian_sparepart.store') }}">
                @csrf

                <label>Transaksi:</label>
                <select name="ID_Transaksi" class="form-control mb-3">
                    @foreach($transaksi as $t)
                        <option value="{{ $t->ID_Transaksi }}">{{ $t->ID_Transaksi }}</option>
                    @endforeach
                </select><br>

                <label>Sparepart:</label>
                <select name="ID_Sparepart" class="form-control mb-3">
                    @foreach($sparepart as $s)
                        <option value="{{ $s->ID_Sparepart }}">{{ $s->Nama_Sparepart }}</option>
                    @endforeach
                </select><br>

                <label>Jumlah Beli:</label>
                <input type="number" name="Jumlah_Beli" class="form-control mb-3" required><br>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
