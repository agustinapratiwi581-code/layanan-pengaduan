<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\KategoriPengaduan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::with(['kategori', 'user'])
            ->latest()
            ->get();

        return view('pengaduan.index', compact('pengaduans'));
    }

    public function create()
    {
        $kategori = KategoriPengaduan::all();
        $users = User::all();

        return view('pengaduan.create', compact('kategori', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kategori_pengaduan_id' => 'required|exists:kategori_pengaduan,id',
            'judul' => 'required|string|max:255',
            'isi_pengaduan' => 'required|string',
            'foto' => 'nullable|image|max:2048',
            'status' => 'required|in:menunggu,diproses,selesai',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pengaduan', 'public');
        }

        Pengaduan::create($data);

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil ditambahkan.');
    }

    public function edit(Pengaduan $pengaduan)
    {
        $kategori = KategoriPengaduan::all();
        $users = User::all();

        return view('pengaduan.edit', compact('pengaduan', 'kategori', 'users'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kategori_pengaduan_id' => 'required|exists:kategori_pengaduan,id',
            'judul' => 'required|string|max:255',
            'isi_pengaduan' => 'required|string',
            'foto' => 'nullable|image|max:2048',
            'status' => 'required|in:menunggu,diproses,selesai',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($pengaduan->foto) {
                Storage::disk('public')->delete($pengaduan->foto);
            }

            $data['foto'] = $request->file('foto')->store('pengaduan', 'public');
        }

        $pengaduan->update($data);

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil diperbarui.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->foto) {
            Storage::disk('public')->delete($pengaduan->foto);
        }

        $pengaduan->delete();

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus.');
    }
}
