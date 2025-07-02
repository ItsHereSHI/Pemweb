<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->id(); // Kolom ID utama untuk tabel konsultasi
            // Kolom id_pawrent yang merujuk ke id_pawrent di tabel pawrent
            $table->integer('id_pawrent');
            $table->foreign('id_pawrent')->references('id_pawrent')->on('pawrent')->onDelete('cascade');

            // Kolom id_dokter yang merujuk ke id_dokter di tabel dokter_hewan
            $table->integer('id_dokter');
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter_hewan')->onDelete('cascade');

            $table->text('pesan');
            $table->enum('status', ['pending', 'proses', 'selesai'])->default('pending');
            $table->timestamps();
        });
    }

};
