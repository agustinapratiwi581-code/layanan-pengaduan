<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'wargas';

    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'no_telepon',
    ];
}