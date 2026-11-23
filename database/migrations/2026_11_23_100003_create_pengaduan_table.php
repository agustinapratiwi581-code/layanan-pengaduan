<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('warga')->cascadeOnDelete();
            $table->foreignId('kategori_pengaduan_id')->constrained('kategori_pengaduan')->cascadeOnDelete();
            $table->string('kode_tiket')->unique();
            $table->date('tanggal');
            $table->string('judul');
            $table->text('isi');
            $table->enum('status', ['baru', 'diproses', 'selesai'])->default('baru');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
