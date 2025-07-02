<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('portofolio', function (Blueprint $table) {
        $table->id('id_portofolio'); // ID portofolio
        $table->unsignedBigInteger('id_member'); // Foreign Key
        $table->string('judul_deskripsi'); // Judul dan Deskripsi
        $table->string('no_hp'); // Nomor HP
        $table->string('alamat'); // Alamat
        $table->timestamps();

        // Menambahkan Foreign Key
        $table->foreign('id_member')->references('id_member')->on('members')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolio');
    }
};
