<?php

use Illuminate\Support\Facades\Route;
use App\Models\KategoriPengaduan;
use App\Http\Controllers\KategoriPengaduanController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    $totalKategori = KategoriPengaduan::count();

    return view('layouts.dashboard', compact('totalKategori'));
})->name('dashboard');

Route::resource('kategori', KategoriPengaduanController::class)
    ->except(['show']);