@extends('layouts.dokters')

@section('content')
<div class="container">
    <h3>Balas Konsultasi</h3>

    <p><strong>Pertanyaan:</strong> {{ $konsultasi->pesan }}</p>

    <form action="{{ route('dokter.konsultasi.balas.store', $konsultasi->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="balasan" class="form-label">Balasan</label>
            <textarea name="balasan" id="balasan" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Balas</button>
    </form>
</div>
@endsection
