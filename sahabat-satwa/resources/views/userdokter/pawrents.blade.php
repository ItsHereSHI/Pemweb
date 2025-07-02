@extends('layouts.dokters')

@section('title', 'Daftar Pemilik Hewan')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Pemilik Hewan</h5>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>No. Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pawrents as $pawrent)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pawrent->nama_lengkap }}</td>
                        <td>{{ $pawrent->no_telepon }}</td>
                        <td>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
