@extends('layouts.app')

@section('title', 'Data Admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Admin</h5>
        <a href="{{ route('admin.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Admin
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id=table class="table table-striped table-hover">
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <td>{{ $admin->id_admin }}</td>
                            <td>{{ $admin->nama }}</td>
                            <td>{{ $admin->username }}</td>
                            <td>
                                <a href="{{ route('admin.edit', $admin->id_admin) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.destroy', $admin->id_admin) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus admin ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
