<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function index()
    {
        $tanggapans = Tanggapan::with('pengaduan')
            ->latest()
            ->get();

        return view('tanggapan.index', compact('tanggapans'));
    }

    public function create()
    {
        $pengaduans = Pengaduan::all();

        return view('tanggapan.create', compact('pengaduans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pengaduan_id' => 'required|exists:pengaduans,id',
            'isi_tanggapan' => 'required|string',
        ]);

        Tanggapan::create($request->only([
            'pengaduan_id',
            'isi_tanggapan',
        ]));

        return redirect()->route('tanggapan.index')
            ->with('success', 'Tanggapan berhasil ditambahkan.');
    }

    public function show(Tanggapan $tanggapan)
    {
        $tanggapan->load('pengaduan');

        return view('tanggapan.show', compact('tanggapan'));
    }

    public function edit(Tanggapan $tanggapan)
    {
        $pengaduans = Pengaduan::all();

        return view('tanggapan.edit', compact('tanggapan', 'pengaduans'));
    }

    public function update(Request $request, Tanggapan $tanggapan)
    {
        $request->validate([
            'pengaduan_id' => 'required|exists:pengaduans,id',
            'isi_tanggapan' => 'required|string',
        ]);

        $tanggapan->update($request->only([
            'pengaduan_id',
            'isi_tanggapan',
        ]));

        return redirect()->route('tanggapan.index')
            ->with('success', 'Tanggapan berhasil diperbarui.');
    }

    public function destroy(Tanggapan $tanggapan)
    {
        $tanggapan->delete();

        return redirect()->route('tanggapan.index')
            ->with('success', 'Tanggapan berhasil dihapus.');
    }
}
