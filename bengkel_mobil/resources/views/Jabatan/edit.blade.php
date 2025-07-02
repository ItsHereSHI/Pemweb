@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Jabatan</h1>

    <form action="{{ route('jabatan.update', $jabatan->ID_Jabatan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Nama_Jabatan">Nama Jabatan</label>
            <input type="text" name="Nama_Jabatan" class="form-control" id="Nama_Jabatan" value="{{ $jabatan->Nama_Jabatan }}" required>
        </div>

        <div class="form-group">
            <label for="Gaji">Gaji</label>
            <input type="number" name="Gaji" class="form-control" id="Gaji" value="{{ $jabatan->Gaji }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
