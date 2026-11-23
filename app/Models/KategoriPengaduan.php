<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriPengaduan extends Model
{
    protected $table = 'kategori_pengaduan';

    protected $fillable = ['nama_kategori', 'bidang_penanggung_jawab'];

    // 1 kategori punya banyak pengaduan
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'kategori_pengaduan_id');
    }
}
