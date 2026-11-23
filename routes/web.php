<?php

use Illuminate\Support\Facades\Route;
use App\Models\KategoriPengaduan;
use App\Models\Warga;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Http\Controllers\KategoriPengaduanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\WargaController;



Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    $totalKategori = KategoriPengaduan::count();
    $totalWarga = Warga::count();
    $totalPengaduan = Pengaduan::count();
    $totalTanggapan = Tanggapan::count();

    return view('dashboard', compact(
        'totalKategori',
        'totalWarga',
        'totalPengaduan',
        'totalTanggapan'
    ));
})->name('dashboard');
Route::resource('kategori', KategoriPengaduanController::class)
    ->except(['show']);

Route::resource('tanggapan', TanggapanController::class);
Route::resource('tanggapan', TanggapanController::class)
    ->except(['show']);
Route::resource('pengaduan', PengaduanController::class)
    ->except(['show']);

Route::resource('tanggapan', TanggapanController::class)
    ->except(['show']);

Route::resource('warga', WargaController::class)
    ->except(['show']);
