<?php

namespace Database\Seeders;

use App\Models\KategoriPengaduan;
use Illuminate\Database\Seeder;

class KategoriPengaduanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'Infrastruktur',     'bidang_penanggung_jawab' => 'Dinas Pekerjaan Umum'],
            ['nama_kategori' => 'Kebersihan',        'bidang_penanggung_jawab' => 'Dinas Lingkungan Hidup'],
            ['nama_kategori' => 'Keamanan',          'bidang_penanggung_jawab' => 'Satpol PP dan Linmas'],
            ['nama_kategori' => 'Kesehatan',         'bidang_penanggung_jawab' => 'Dinas Kesehatan'],
            ['nama_kategori' => 'Pelayanan Publik',  'bidang_penanggung_jawab' => 'Bagian Pelayanan Umum'],
        ];

        foreach ($data as $item) {
            KategoriPengaduan::create($item);
        }
    }
}
