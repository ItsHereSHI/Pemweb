@extends('layouts.pawrent')

@section('content')
<div class="container">
    <h2>Konsultasi dengan drh. {{ $dokterhewan->nama_lengkap }}</h2>

    <div class="chat-box" style="max-height: 400px; overflow-y: auto;">
        <!-- Pesan dari user -->
        <div class="message user-message">
            <div class="message-content">
                <p>Keluhan saya: [Isi keluhan]</p>
            </div>
        </div>

        <!-- Balasan dari dokter hewan -->
        <div class="message doctor-message">
            <div class="message-content">
                <p>Balasan dokter: [Balasan dokter]</p>
            </div>
        </div>
    </div>

    <form action="{{ route('konsultasi.store') }}" method="POST">
        @csrf
        <input type="hidden" name="id_dokter" value="{{ $dokterhewan->id_dokter }}">

        <!-- Input keluhan yang dikirim oleh user -->
        <div class="form-group mt-3">
            <label for="keluhan">Keluhan</label>
            <textarea name="keluhan" class="form-control" rows="4" required placeholder="Tulis keluhan Anda..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Kirim Konsultasi</button>
    </form>
</div>

@endsection

@section('styles')
    <style>
        /* Styling untuk chat box */
        .chat-box {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }
        .message {
            display: flex;
            margin-bottom: 15px;
        }
        .user-message .message-content {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 10px;
            max-width: 80%;
        }
        .doctor-message .message-content {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border-radius: 10px;
            max-width: 80%;
            align-self: flex-end;
        }
        .message-content p {
            margin: 0;
        }
    </style>
@endsection
