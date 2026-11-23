<?php

namespace Database\Seeders;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Database\Seeder;

class TanggapanSeeder extends Seeder
{
    public function run(): void
    {
        $pengaduan = Pengaduan::orderBy('id')->pluck('id')->values();

        // [indeks pengaduan, petugas, selisih hari dari hari ini, isi]
        $data = [
            [1, 'Pak Hendra', 6, 'Laporan diterima. Petugas kebersihan dijadwalkan mengangkut sampah besok pagi.'],
            [1, 'Pak Hendra', 4, 'Pengangkutan sudah dilakukan sebagian, sisanya dikerjakan hari ini.'],
            [2, 'Bu Rina',    5, 'Tim listrik akan memeriksa titik lampu yang mati dalam 2 hari.'],
            [3, 'Bu Sari',    4, 'Loket tambahan sudah dibuka pada jam sibuk.'],
            [3, 'Bu Sari',    3, 'Pelayanan sudah berjalan normal. Terima kasih atas laporannya.'],
            [5, 'Pak Joko',   2, 'Petugas akan membersihkan saluran pada akhir pekan.'],
            [6, 'Pak Andi',   1, 'Perbaikan atap dan lampu pos ronda telah selesai dikerjakan.'],
        ];

        foreach ($data as [$idx, $petugas, $hari, $isi]) {
            Tanggapan::create([
                'pengaduan_id'  => $pengaduan[$idx],
                'petugas'       => $petugas,
                'tanggal'       => now()->subDays($hari)->toDateString(),
                'isi_tanggapan' => $isi,
            ]);
        }
    }
}
