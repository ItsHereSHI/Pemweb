@extends('layouts.dokters')

@section('title', 'Dashboard Dokter Hewan')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4>Selamat Datang, {{ session('dokter_hewans')->username }}</h4>
        </div>
        <div class="card-body">
            <p>Anda telah berhasil login sebagai Dokter Hewan.</p>
            <a href="{{ route('dokterhewans.logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>
@endsection
