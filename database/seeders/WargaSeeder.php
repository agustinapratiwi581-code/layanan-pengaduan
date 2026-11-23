<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        $wargas = [
            [
                'nik' => '3501010101010001',
                'nama' => 'Ahmad Fauzi',
                'alamat' => 'Jl. Merdeka No. 10',
                'no_telepon' => '081234567801',
            ],
            [
                'nik' => '3501010101010002',
                'nama' => 'Siti Aminah',
                'alamat' => 'Jl. Melati No. 15',
                'no_telepon' => '081234567802',
            ],
            [
                'nik' => '3501010101010003',
                'nama' => 'Budi Santoso',
                'alamat' => 'Jl. Mawar No. 20',
                'no_telepon' => '081234567803',
            ],
            [
                'nik' => '3501010101010004',
                'nama' => 'Dewi Lestari',
                'alamat' => 'Jl. Kenanga No. 5',
                'no_telepon' => '081234567804',
            ],
            [
                'nik' => '3501010101010005',
                'nama' => 'Rizky Pratama',
                'alamat' => 'Jl. Anggrek No. 8',
                'no_telepon' => '081234567805',
            ],
            [
                'nik' => '3501010101010006',
                'nama' => 'Nurul Hidayah',
                'alamat' => 'Jl. Cempaka No. 12',
                'no_telepon' => '081234567806',
            ],
            [
                'nik' => '3501010101010007',
                'nama' => 'Andi Saputra',
                'alamat' => 'Jl. Diponegoro No. 7',
                'no_telepon' => '081234567807',
            ],
            [
                'nik' => '3501010101010008',
                'nama' => 'Rina Marlina',
                'alamat' => 'Jl. Sudirman No. 18',
                'no_telepon' => '081234567808',
            ],
            [
                'nik' => '3501010101010009',
                'nama' => 'Agus Setiawan',
                'alamat' => 'Jl. Ahmad Yani No. 25',
                'no_telepon' => '081234567809',
            ],
            [
                'nik' => '3501010101010010',
                'nama' => 'Fitri Handayani',
                'alamat' => 'Jl. Pahlawan No. 30',
                'no_telepon' => '081234567810',
            ],
        ];

        foreach ($wargas as $warga) {
            Warga::firstOrCreate(
                ['nik' => $warga['nik']],
                $warga
            );
        }
    }
}
