<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    private function rules(): array
    {
        return [
            'nama'      => 'required|string|max:255',
            'no_hp'     => 'required|string|max:20',
            'alamat'    => 'required|string',
            'kelurahan' => 'required|string|max:255',
        ];
    }

    public function index(Request $request)
    {
        $q = $request->query('q');

        $warga = Warga::withCount('pengaduan')
            ->when($q, function ($query) use ($q) {
                $query->where(function ($w) use ($q) {
                    $w->where('nama', 'like', "%{$q}%")
                      ->orWhere('kelurahan', 'like', "%{$q}%")
                      ->orWhere('no_hp', 'like', "%{$q}%");
                });
            })
            ->latest()
            ->get();

        return view('warga.index', compact('warga', 'q'));
    }

    public function create()
    {
        return view('warga.create');
    }

    public function store(Request $request)
    {
        Warga::create($request->validate($this->rules()));

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil ditambahkan.');
    }

    public function edit(Warga $warga)
    {
        return view('warga.edit', compact('warga'));
    }

    public function update(Request $request, Warga $warga)
    {
        $warga->update($request->validate($this->rules()));

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil diperbarui.');
    }

    public function destroy(Warga $warga)
    {
        $warga->delete();

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil dihapus.');
    }
}
