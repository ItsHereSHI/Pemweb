@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h2 class="mb-4" style="text-align: left;">Edit Sparepart</h2>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            <form method="POST" action="{{ route('sparepart.update', $sparepart->ID_Sparepart) }}">
                @csrf
                @method('PUT')

                <label>Nama Sparepart:</label>
                <input type="text" name="Nama_Sparepart" value="{{ $sparepart->Nama_Sparepart }}" class="form-control mb-3" required><br>

                <label>Stok:</label>
                <input type="number" name="Stok" value="{{ $sparepart->Stok }}" class="form-control mb-3" required><br>

                <label>Jenis Sparepart:</label>
                <input type="text" name="Jenis_Sparepart" value="{{ $sparepart->Jenis_Sparepart }}" class="form-control mb-3" required><br>

                <label>Harga:</label>
                <input type="text" name="Harga" value="{{ $sparepart->Harga }}" class="form-control mb-3" required><br>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
