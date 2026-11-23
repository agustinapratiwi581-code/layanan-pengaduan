<?php

namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Seeder;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Ahmad Fauzi',   'no_hp' => '081234567801', 'alamat' => 'Jl. Merdeka No. 10',  'kelurahan' => 'Pare'],
            ['nama' => 'Siti Aminah',   'no_hp' => '081234567802', 'alamat' => 'Jl. Melati No. 15',   'kelurahan' => 'Tulungrejo'],
            ['nama' => 'Budi Santoso',  'no_hp' => '081234567803', 'alamat' => 'Jl. Mawar No. 20',    'kelurahan' => 'Pelem'],
            ['nama' => 'Dewi Lestari',  'no_hp' => '081234567804', 'alamat' => 'Jl. Kenanga No. 7',   'kelurahan' => 'Palem'],
            ['nama' => 'Rizky Pratama', 'no_hp' => '081234567805', 'alamat' => 'Jl. Anggrek No. 3',   'kelurahan' => 'Bendo'],
            ['nama' => 'Nur Hidayah',   'no_hp' => '081234567806', 'alamat' => 'Jl. Dahlia No. 12',   'kelurahan' => 'Pare'],
        ];

        foreach ($data as $item) {
            Warga::create($item);
        }
    }
}
