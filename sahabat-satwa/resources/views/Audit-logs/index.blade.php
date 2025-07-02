@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-white">Audit Log</h1>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Log Aktivitas Pengguna</h5>
        </div>
        <div class="card-body">
            <table id=table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Aksi</th>
                        <th>Waktu</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($auditLogs as $index => $log)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $log->user }}</td>
                        <td>{{ $log->action }}</td>
                        <td>{{ $log->timestamp }}</td>
                        <td>
                            <a href="{{ route('audit-logs.show', $log->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
