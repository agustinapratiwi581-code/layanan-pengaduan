<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapan';

    protected $fillable = ['pengaduan_id', 'petugas', 'tanggal', 'isi_tanggapan'];

    protected $casts = ['tanggal' => 'date'];

    // tanggapan milik 1 pengaduan
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'pengaduan_id');
    }
}
