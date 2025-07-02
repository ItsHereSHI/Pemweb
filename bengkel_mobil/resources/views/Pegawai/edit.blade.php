@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h1 class="mb-4" style="text-align: left;">Edit Pegawai</h1>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            <form action="{{ route('pegawai.update', $pegawai->ID_Pegawai) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="Nama_Pegawai" class="form-label">Nama Pegawai</label>
                    <input type="text" class="form-control" name="Nama_Pegawai" value="{{ $pegawai->Nama_Pegawai }}" required>
                </div>

                <div class="mb-3">
                    <label for="Alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="Alamat" rows="3" required>{{ $pegawai->Alamat }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="Username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="Username" value="{{ $pegawai->Username }}" required>
                </div>

                <div class="mb-3">
                    <label for="PASSWORD" class="form-label">Password</label>
                    <input type="password" class="form-control" name="PASSWORD" placeholder="(Biarkan kosong jika tidak diubah)">
                </div>

                <div class="mb-3">
                    <label for="ID_Jabatan" class="form-label">Jabatan</label>
                    <select name="ID_Jabatan" class="form-select" required>
                        @foreach ($jabatan as $j)
                            <option value="{{ $j->ID_Jabatan }}" {{ $pegawai->ID_Jabatan == $j->ID_Jabatan ? 'selected' : '' }}>
                                {{ $j->Nama_Jabatan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
