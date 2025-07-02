<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rating_dokter', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pawrent');
            $table->integer('id_dokter');
            $table->integer('rating');
            $table->timestamps();

            $table->unique(['id_pawrent', 'id_dokter']);
            $table->foreign('id_pawrent')->references('id_pawrent')->on('pawrent')->onDelete('cascade');
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter_hewan')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating_dokter');
    }
};
