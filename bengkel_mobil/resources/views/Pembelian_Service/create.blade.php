@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h1 class="mb-4" style="text-align: left;">Tambah Pembelian Service</h1>

    <form method="POST" action="{{ route('pembelian_service.store') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="ID_Transaksi">Transaksi:</label>
            <select name="ID_Transaksi" class="form-control" required>
                @foreach($transaksi as $t)
                    <option value="{{ $t->ID_Transaksi }}">{{ $t->ID_Transaksi }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="ID_Pegawai">Pegawai:</label>
            <select name="ID_Pegawai" class="form-control" required>
                @foreach($pegawai as $p)
                    <option value="{{ $p->ID_Pegawai }}">{{ $p->Nama_Pegawai }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="ID_Service">Service:</label>
            <select name="ID_Service" class="form-control" required>
                @foreach($service as $s)
                    <option value="{{ $s->ID_Servis }}">{{ $s->Nama_Service }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
