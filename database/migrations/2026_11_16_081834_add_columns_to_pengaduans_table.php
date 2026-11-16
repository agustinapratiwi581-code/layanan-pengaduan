
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('kategori_pengaduan_id')->constrained('kategori_pengaduan')->cascadeOnDelete();
            $table->string('judul');
            $table->text('isi_pengaduan');
            $table->string('foto')->nullable();
            $table->string('status')->default('menunggu');
        });
    }

    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['kategori_pengaduan_id']);
            $table->dropColumn([
                'user_id',
                'kategori_pengaduan_id',
                'judul',
                'isi_pengaduan',
                'foto',
                'status',
            ]);
        });
    }
};
