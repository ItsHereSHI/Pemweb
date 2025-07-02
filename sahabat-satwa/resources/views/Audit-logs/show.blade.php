@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-white">Detail Audit Log</h1>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Informasi Log</h5>
        </div>
        <div class="card-body">

            <div class="mb-3">
                <strong>User:</strong>
                <p>{{ $auditLog->user }}</p>
            </div>

            <div class="mb-3">
                <strong>Aksi:</strong>
                <p>{{ $auditLog->action }}</p>
            </div>



            <div class="mb-3">
                <strong>Timestamp:</strong>
                <p>{{ $auditLog->timestamp }}</p>
            </div>



            <a href="{{ route('audit-logs.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
