<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    protected $fillable = [
        'warga_id',
        'kategori_pengaduan_id',
        'kode_tiket',
        'tanggal',
        'judul',
        'isi',
        'status',
    ];

    protected $casts = ['tanggal' => 'date'];

    // pengaduan milik 1 warga
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    // pengaduan milik 1 kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriPengaduan::class, 'kategori_pengaduan_id');
    }

    // 1 pengaduan punya banyak tanggapan
    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'pengaduan_id');
    }
}
