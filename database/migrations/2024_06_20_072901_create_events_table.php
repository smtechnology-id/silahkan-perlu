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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('maksud_perjalanan_dinas');
            $table->string('tujuan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('pelaksana_peserta');
            $table->text('latar_belakang');
            $table->string('nomor_surat')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->text('hasil_kegiatan');
            $table->string('status_tindak_lanjut');
            $table->text('rencana_kegiatan')->nullable();
            $table->date('rencana_waktu')->nullable();
            $table->text('pelaksanaan_kegiatan')->nullable();
            $table->date('pelaksanaan_waktu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
