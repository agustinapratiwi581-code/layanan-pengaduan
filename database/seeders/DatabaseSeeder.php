<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // Urutan: induk -> anak
    public function run(): void
    {
        $this->call([
            KategoriPengaduanSeeder::class,
            WargaSeeder::class,
            PengaduanSeeder::class,
            TanggapanSeeder::class,
        ]);
    }
}
