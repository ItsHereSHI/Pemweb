@extends('layouts.pawrent')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Konsultasi Saya</h2>

    @if ($konsultasis->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            Anda belum melakukan konsultasi apapun.
        </div>
    @else
        <div class="row">
            @foreach ($konsultasis as $konsultasi)
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm border-light rounded">
                        <div class="card-body">
                            <h5 class="card-title">Keluhan: {{ $konsultasi->pesan }}</h5>
                            <p><strong>Dokter: </strong>drh. {{ $konsultasi->dokter->nama_lengkap }}</p>

                            <!-- Status dengan badge yang lebih terlihat -->
                            <p><strong>Status: </strong> {{ $konsultasi->status }}
                                <span class="badge
                                    @if($konsultasi->status == 'pending') badge-warning
                                    @elseif($konsultasi->status == 'selesai') badge-success
                                    @elseif($konsultasi->status == 'proses') badge-danger
                                    @else badge-secondary @endif">
                                    {{ ucfirst($konsultasi->status) }}
                                </span>
                            </p>

                            @if ($konsultasi->balasan)
                                <div class="mt-3">
                                    <h6><strong>Balasan Dokter:</strong></h6>
                                    <p>{{ $konsultasi->balasan }}</p>
                                </div>
                            @else
                                <p class="text-warning"><em>Belum ada balasan dari dokter.</em></p>
                            @endif

                            <hr>
                            <p><strong>Waktu Konsultasi:</strong> {{ \Carbon\Carbon::parse($konsultasi->created_at)->format('d-m-Y H:i') }}</p>

                            <!-- Rating Dokter jika konsultasi selesai dan belum memberikan rating -->
                            @if ($konsultasi->status == 'selesai' && !$konsultasi->sudah_rating)
    <form action="{{ route('dokter.rating') }}" method="POST" class="mt-3">
        @csrf
        <input type="hidden" name="dokter_id" value="{{ $konsultasi->dokter->id_dokter }}">
        <label for="rating">Beri Rating ke Dokter:</label>
        <select name="rating" id="rating" class="form-select w-auto d-inline mx-2">
            <option value="1">1 ⭐</option>
            <option value="2">2 ⭐</option>
            <option value="3">3 ⭐</option>
            <option value="4">4 ⭐</option>
            <option value="5">5 ⭐</option>
        </select>
        <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
    </form>
@elseif ($konsultasi->sudah_rating)
    <div class="alert alert-info mt-3">
        Anda sudah memberikan rating untuk dokter ini.
    </div>
@endif


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
