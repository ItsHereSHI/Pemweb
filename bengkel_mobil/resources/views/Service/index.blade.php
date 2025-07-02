@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h1 class="mb-4" style="text-align: left;">Daftar Service</h1>

    <a href="{{ route('service.create') }}" class="btn btn-primary mb-3">Tambah Service</a>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            <table  id="Table" class="table table-bordered table-striped text-center">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Lama Pengerjaan</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $s)
                    <tr>
                        <td>{{ $s->ID_Servis }}</td>
                        <td>{{ $s->Nama_Service }}</td>
                        <td>{{ $s->Lama_Pengerjaan }}</td>
                        <td>Rp {{ number_format($s->Harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('service.edit', $s->ID_Servis) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('service.destroy', $s->ID_Servis) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
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
