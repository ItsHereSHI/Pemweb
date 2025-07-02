@extends('layouts.app')

@section('content')
<div class="container p-0"> <!-- Menghilangkan padding bawaan container -->
    <h1 class="mb-4" style="text-align: left;">Tambah Nomor Pegawai</h1>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            <form method="POST" action="{{ route('nomor_pegawai.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="ID_Pegawai" class="form-label">Pegawai:</label>
                    <select name="ID_Pegawai" id="ID_Pegawai" class="form-select">
                        @foreach($pegawai as $p)
                            <option value="{{ $p->ID_Pegawai }}">{{ $p->Nama_Pegawai }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="No_Tlp" class="form-label">Nomor Telepon:</label>
                    <input type="text" name="No_Tlp" id="No_Tlp" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
