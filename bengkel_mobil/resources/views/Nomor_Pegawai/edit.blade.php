@extends('layouts.app')

@section('content')
<div class="container p-0"> <!-- Menghilangkan padding pada container -->
    <h1 class="mb-4" style="text-align: left;">Edit Nomor Pegawai</h1>

    <div class="card shadow-sm" style="width: 60%; margin-left: 0;">
        <div class="card-body">
            <form method="POST" action="{{ route('nomor_pegawai.update', $nomor->ID_Nomor) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="ID_Pegawai" class="form-label">Pegawai:</label>
                    <select name="ID_Pegawai" class="form-select" id="ID_Pegawai">
                        @foreach($pegawai as $p)
                            <option value="{{ $p->ID_Pegawai }}" {{ $p->ID_Pegawai == $nomor->ID_Pegawai ? 'selected' : '' }}>
                                {{ $p->Nama_Pegawai }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="No_Tlp" class="form-label">Nomor Telepon:</label>
                    <input type="text" name="No_Tlp" class="form-control" id="No_Tlp" value="{{ $nomor->No_Tlp }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
