<?php

use Illuminate\Support\Facades\Route;
use App\Models\KategoriPengaduan;
use App\Http\Controllers\KategoriPengaduanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    $totalKategori = KategoriPengaduan::count();

    return view('dashboard', compact('totalKategori'));
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