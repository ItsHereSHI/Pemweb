@extends('layouts.app')

@section('content')
<div class="container p-0">
    <h1 class="mb-4" style="text-align: left;">Edit Pelanggan</h1>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            <form action="{{ route('pelanggan.update', $pelanggan->ID_Pelanggan) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Pelanggan</label>
                    <input type="text" name="Nama_Pelanggan" class="form-control" value="{{ $pelanggan->Nama_Pelanggan }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
