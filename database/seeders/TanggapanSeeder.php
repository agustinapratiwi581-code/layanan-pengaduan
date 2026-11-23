<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tanggapan;
use App\Models\Pengaduan;

class TanggapanSeeder extends Seeder
{
    public function run(): void
    {
        $pengaduans = Pengaduan::orderBy('id')->get();

        if ($pengaduans->count() < 10) {
            throw new \RuntimeException(
                'Data pengaduan belum mencukupi. Pastikan 10 pengaduan sudah tersedia.'
            );
        }

        $dataTanggapan = [
            'Terima kasih atas laporannya. Kami akan segera melakukan pemeriksaan.',
            'Laporan telah diterima dan sedang ditindaklanjuti oleh petugas.',
            'Petugas akan segera memeriksa kondisi lampu jalan tersebut.',
            'Kami akan berkoordinasi dengan petugas kebersihan untuk menangani masalah ini.',
            'Perbaikan fasilitas umum telah selesai dilakukan.',
            'Laporan sudah diteruskan kepada petugas terkait untuk penanganan.',
            'Kami akan melakukan pengecekan kebersihan lingkungan tersebut.',
            'Kerusakan jembatan akan diperiksa oleh petugas lapangan.',
            'Terima kasih. Lokasi pembuangan sampah telah ditangani.',
            'Kami sedang berkoordinasi dengan pihak penyedia air bersih.',
        ];

        foreach ($pengaduans->take(10) as $index => $pengaduan) {
            Tanggapan::updateOrCreate(
                ['pengaduan_id' => $pengaduan->id],
                ['isi_tanggapan' => $dataTanggapan[$index]]
            );
        }
    }
}
