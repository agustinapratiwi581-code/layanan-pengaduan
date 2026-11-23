<?php

namespace Database\Seeders;

use App\Models\KategoriPengaduan;
use App\Models\Pengaduan;
use App\Models\Warga;
use Illuminate\Database\Seeder;

class PengaduanSeeder extends Seeder
{
    public function run(): void
    {
        $wargaIds    = Warga::orderBy('id')->pluck('id')->values();
        $kategoriIds = KategoriPengaduan::orderBy('id')->pluck('id')->values();

        $data = [
            ['Jalan berlubang di depan pasar',        'Lubang cukup dalam dan membahayakan pengendara motor, terutama saat hujan.',   'baru',     0],
            ['Sampah menumpuk di TPS',                'Sampah belum diangkut lebih dari seminggu dan mulai berbau.',                  'diproses', 1],
            ['Lampu jalan mati',                      'Lampu penerangan di gang utama mati sehingga rawan kejahatan.',                'diproses', 2],
            ['Layanan puskesmas lambat',              'Antrean pendaftaran sangat panjang karena loket yang buka hanya satu.',        'selesai',  3],
            ['Pengurusan KTP terlalu lama',           'Sudah tiga minggu pengajuan belum ada kabar.',                                 'baru',     4],
            ['Saluran air tersumbat',                 'Air meluap ke jalan saat hujan deras.',                                        'diproses', 0],
            ['Pos ronda tidak terawat',               'Atap bocor dan lampu pos ronda tidak berfungsi.',                              'selesai',  2],
            ['Pembuangan sampah liar di sungai',      'Warga luar sering membuang sampah di bantaran sungai.',                        'baru',     1],
        ];

        foreach ($data as $i => [$judul, $isi, $status, $kat]) {
            Pengaduan::create([
                'warga_id'              => $wargaIds[$i % $wargaIds->count()],
                'kategori_pengaduan_id' => $kategoriIds[$kat % $kategoriIds->count()],
                'kode_tiket'            => sprintf('TKT-20261123-%04d', $i + 1),
                'tanggal'               => now()->subDays(8 - $i)->toDateString(),
                'judul'                 => $judul,
                'isi'                   => $isi,
                'status'                => $status,
            ]);
        }
    }
}
