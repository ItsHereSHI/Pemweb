@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h1 class="mb-4" style="text-align: left;">Tambah Pegawai</h1>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            <form action="{{ route('pegawai.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="Nama_Pegawai" class="form-label">Nama Pegawai</label>
                    <input type="text" class="form-control" name="Nama_Pegawai" placeholder="Nama" required>
                </div>

                <div class="mb-3">
                    <label for="Alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="Alamat" rows="3" placeholder="Alamat" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="Username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="Username" placeholder="Username" required>
                </div>

                <div class="mb-3">
                    <label for="PASSWORD" class="form-label">Password</label>
                    <input type="password" class="form-control" name="PASSWORD" placeholder="Password" required>
                </div>

                <div class="mb-3">
                    <label for="ID_Jabatan" class="form-label">Jabatan</label>
                    <select name="ID_Jabatan" class="form-select" required>
                        @foreach ($jabatan as $j)
                            <option value="{{ $j->ID_Jabatan }}">{{ $j->Nama_Jabatan }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
