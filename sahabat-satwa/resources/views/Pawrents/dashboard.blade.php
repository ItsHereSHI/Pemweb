@extends('layouts.pawrent')

@section('content')
    <div class="container mt-5">
        <div class="bg-light bg-opacity-75 p-4 rounded shadow-sm">
            <h1 class="mb-4 text-dark">
                Selamat datang, <strong>{{ session('pawrent')->username }}</strong>
            </h1>

            <a href="{{ route('pawrent.logout') }}" class="btn btn-danger">
                Logout
            </a>

            <hr class="my-4 text-dark">

            <!-- Tambahkan konten lainnya di sini -->
        </div>
    </div>
@endsection
