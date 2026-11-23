<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengaduan;
use App\Models\User;
use App\Models\KategoriPengaduan;

class PengaduanSeeder extends Seeder
{
    public function run(): void
    {
        // Menyiapkan akun pelapor
        $user = User::firstOrCreate(
            ['email' => 'pelapor@gmail.com'],
            [
                'name' => 'Warga Pelapor',
                'password' => 'password123',
            ]
        );

        // Mengambil ID kategori yang sudah tersedia
        $kategoriIds = KategoriPengaduan::pluck('id');

        if ($kategoriIds->isEmpty()) {
            throw new \RuntimeException(
                'Data kategori belum tersedia. Isi kategori terlebih dahulu.'
            );
        }

        // 10 data pengaduan dummy
        $dataPengaduan = [
            [
                'judul' => 'Jalan Rusak di Desa Sukamaju',
                'isi_pengaduan' => 'Terdapat jalan berlubang yang membahayakan pengguna jalan.',
                'status' => 'menunggu',
            ],
            [
                'judul' => 'Sampah Menumpuk di Pasar',
                'isi_pengaduan' => 'Sampah menumpuk di sekitar pasar dan belum dibersihkan.',
                'status' => 'diproses',
            ],
            [
                'judul' => 'Lampu Jalan Mati',
                'isi_pengaduan' => 'Lampu penerangan jalan di lingkungan warga sudah tidak menyala.',
                'status' => 'menunggu',
            ],
            [
                'judul' => 'Saluran Air Tersumbat',
                'isi_pengaduan' => 'Saluran air tersumbat sehingga menyebabkan genangan.',
                'status' => 'diproses',
            ],
            [
                'judul' => 'Kerusakan Fasilitas Umum',
                'isi_pengaduan' => 'Beberapa fasilitas umum mengalami kerusakan dan perlu diperbaiki.',
                'status' => 'selesai',
            ],
            [
                'judul' => 'Pohon Tumbang di Pinggir Jalan',
                'isi_pengaduan' => 'Pohon tumbang menghalangi sebagian akses jalan warga.',
                'status' => 'menunggu',
            ],
            [
                'judul' => 'Kebersihan Lingkungan Kurang Terjaga',
                'isi_pengaduan' => 'Lingkungan sekitar permukiman perlu mendapatkan perhatian kebersihan.',
                'status' => 'diproses',
            ],
            [
                'judul' => 'Kerusakan Jembatan Desa',
                'isi_pengaduan' => 'Bagian jembatan desa mengalami kerusakan dan perlu diperiksa.',
                'status' => 'menunggu',
            ],
            [
                'judul' => 'Pembuangan Sampah Sembarangan',
                'isi_pengaduan' => 'Terdapat pembuangan sampah sembarangan di lahan kosong.',
                'status' => 'selesai',
            ],
            [
                'judul' => 'Air Bersih Tidak Mengalir',
                'isi_pengaduan' => 'Aliran air bersih ke rumah warga mengalami gangguan.',
                'status' => 'diproses',
            ],
        ];

        foreach ($dataPengaduan as $index => $item) {
            Pengaduan::updateOrCreate(
                ['judul' => $item['judul']],
                [
                    'user_id' => $user->id,
                    'kategori_pengaduan_id' => $kategoriIds[$index % $kategoriIds->count()],
                    'isi_pengaduan' => $item['isi_pengaduan'],
                    'foto' => null,
                    'status' => $item['status'],
                ]
            );
        }
    }
}
