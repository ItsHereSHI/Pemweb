@extends('layouts.app')

@section('title', 'Edit Admin')

@section('content')
<div class="card" style="max-width: 600px; margin: auto;">
    <div class="card-header">
        <h5 class="mb-0">Edit Admin</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.update', $admin->id_admin) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $admin->nama }}" required>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $admin->username }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password <small class="text-muted">(kosongkan jika tidak ingin diubah)</small></label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
