<?php

use App\Http\Controllers\KategoriPengaduanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\WargaController;
use App\Models\KategoriPengaduan;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Warga;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('dashboard'));

Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalKategori'  => KategoriPengaduan::count(),
        'totalWarga'     => Warga::count(),
        'totalPengaduan' => Pengaduan::count(),
        'totalTanggapan' => Tanggapan::count(),
    ]);
})->name('dashboard');

Route::resource('kategori', KategoriPengaduanController::class)->except(['show']);
Route::resource('warga', WargaController::class)->except(['show']);
Route::resource('pengaduan', PengaduanController::class); // termasuk show (detail + tanggapan)
Route::resource('tanggapan', TanggapanController::class)->except(['show']);
