@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="text-center mb-5">
            <h1 class="fw-bold">Daftar View</h1>
        </div>

        <div class="row justify-content-center g-4">
            <!-- View 1 -->
            <div class="col-md-4 col-lg-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="mb-3">
                            <h5 class="card-title">View 1</h5>
                            <p class="card-text text-muted">Pemasukan Service Pegawai</p>
                        </div>
                        <a href="{{ route('view1') }}" class="btn btn-primary w-100">Lihat View</a>
                    </div>
                </div>
            </div>

            <!-- View 2 -->
            <div class="col-md-4 col-lg-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="mb-3">
                            <h5 class="card-title">View 2</h5>
                            <p class="card-text text-muted">Sparepart Terbanyak</p>
                        </div>
                        <a href="{{ route('view2') }}" class="btn btn-primary w-100">Lihat View</a>
                    </div>
                </div>
            </div>

            <!-- View 3 -->
            <div class="col-md-4 col-lg-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="mb-3">
                            <h5 class="card-title">View 3</h5>
                            <p class="card-text text-muted">Transaksi Berdasarkasn Pelanggan</p>
                        </div>
                        <a href="{{ route('view3') }}" class="btn btn-primary w-100">Lihat View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
