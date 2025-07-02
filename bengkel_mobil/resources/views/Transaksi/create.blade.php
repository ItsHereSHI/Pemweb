@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h1 class="mb-4" style="text-align: left;">Tambah Transaksi</h1>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Pelanggan</label>
                    <select name="ID_Pelanggan" class="form-control">
                        @foreach($pelanggan as $p)
                        <option value="{{ $p->ID_Pelanggan }}">{{ $p->Nama_Pelanggan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pembelian</label>
                    <input type="date" name="Tanggal_Pembelian" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Total Biaya</label>
                    <input type="number" name="Total_Biaya" class="form-control">
                </div>

                <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
