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
        Schema::create('profile', function (Blueprint $table) {
            $table->uuid('id_profile')->primary();
            $table->string('nama_sekolah');
            $table->string('kepala_Sekolah');   
            $table->string('foto');
            $table->string('logo');
            $table->string('npsn');
            $table->text('alamat');
            $table->text('visi');
            $table->text('misi');
            $table->year('tahun_berdiri');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
