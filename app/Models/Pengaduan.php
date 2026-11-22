<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduans';

    protected $fillable = [
        'user_id',
        'kategori_pengaduan_id',
        'judul',
        'isi_pengaduan',
        'foto',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(
            KategoriPengaduan::class,
            'kategori_pengaduan_id'
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class);
    }
}
