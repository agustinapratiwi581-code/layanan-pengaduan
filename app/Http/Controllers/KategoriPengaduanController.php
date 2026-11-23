<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengaduan;
use Illuminate\Http\Request;

class KategoriPengaduanController extends Controller
{
    private function rules(): array
    {
        return [
            'nama_kategori'           => 'required|string|max:255',
            'bidang_penanggung_jawab' => 'required|string|max:255',
        ];
    }

    public function index(Request $request)
    {
        $q = $request->query('q');

        $kategori = KategoriPengaduan::withCount('pengaduan')
            ->when($q, function ($query) use ($q) {
                $query->where(function ($w) use ($q) {
                    $w->where('nama_kategori', 'like', "%{$q}%")
                      ->orWhere('bidang_penanggung_jawab', 'like', "%{$q}%");
                });
            })
            ->latest()
            ->get();

        return view('kategori.index', compact('kategori', 'q'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        KategoriPengaduan::create($request->validate($this->rules()));

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(KategoriPengaduan $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, KategoriPengaduan $kategori)
    {
        $kategori->update($request->validate($this->rules()));

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(KategoriPengaduan $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
