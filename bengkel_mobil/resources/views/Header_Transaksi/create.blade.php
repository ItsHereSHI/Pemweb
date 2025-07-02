@extends('layouts.app')

@section('content')
<div class="container p-0"> <!-- Menghilangkan padding pada container -->
    <h1 class="mb-4 text-Left">Tambah Header Transaksi</h1>

    <form method="POST" action="{{ route('header_transaksi.store') }}">
        @csrf

        <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
            <div class="card-body">
                <div class="form-group">
                    <label for="ID_Pegawai">Pegawai:</label>
                    <select name="ID_Pegawai" class="form-control" id="ID_Pegawai" required>
                        @foreach($pegawai as $p)
                            <option value="{{ $p->ID_Pegawai }}">{{ $p->Nama_Pegawai }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="ID_Transaksi">Transaksi:</label>
                    <select name="ID_Transaksi" class="form-control" id="ID_Transaksi" required>
                        @foreach($transaksi as $t)
                            <option value="{{ $t->ID_Transaksi }}">Transaksi {{ $t->ID_Transaksi }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection
