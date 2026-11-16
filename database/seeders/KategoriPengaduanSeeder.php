<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriPengaduan;

class KategoriPengaduanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'Infrastruktur', 'deskripsi' => 'Pengaduan jalan dan fasilitas umum'],
            ['nama_kategori' => 'Kebersihan', 'deskripsi' => 'Pengaduan sampah dan lingkungan'],
            ['nama_kategori' => 'Keamanan', 'deskripsi' => 'Pengaduan gangguan keamanan'],
            ['nama_kategori' => 'Kesehatan', 'deskripsi' => 'Pengaduan layanan kesehatan'],
            ['nama_kategori' => 'Pelayanan Publik', 'deskripsi' => 'Pengaduan pelayanan masyarakat'],
        ];

        foreach ($data as $item) {
            KategoriPengaduan::create($item);
        }
    }
}
