
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriPengaduanController;

Route::get('/', function () {
    return redirect()->route('kategori.index');
});

Route::resource('kategori', KategoriPengaduanController::class)
    ->except(['show']);
