<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'warga';

    protected $fillable = ['nama', 'no_hp', 'alamat', 'kelurahan'];

    // 1 warga punya banyak pengaduan
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'warga_id');
    }
}
