@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Jabatan</h1>

    <form action="{{ route('jabatan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="Nama_Jabatan">Nama Jabatan</label>
            <input type="text" name="Nama_Jabatan" class="form-control" id="Nama_Jabatan" required>
        </div>

        <div class="form-group">
            <label for="Gaji">Gaji</label>
            <input type="number" name="Gaji" class="form-control" id="Gaji" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
