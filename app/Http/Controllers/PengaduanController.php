<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengaduan;
use App\Models\Pengaduan;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    private function rules(): array
    {
        return [
            'warga_id'              => 'required|exists:warga,id',
            'kategori_pengaduan_id' => 'required|exists:kategori_pengaduan,id',
            'tanggal'               => 'required|date',
            'judul'                 => 'required|string|max:255',
            'isi'                   => 'required|string',
            'status'                => 'required|in:baru,diproses,selesai',
        ];
    }

    private function buatKodeTiket(): string
    {
        do {
            $kode = 'TKT-' . now()->format('Ymd') . '-' . strtoupper(Str::random(4));
        } while (Pengaduan::where('kode_tiket', $kode)->exists());

        return $kode;
    }

    public function index(Request $request)
    {
        $q      = $request->query('q');
        $status = $request->query('status');

        // eager loading: nama warga & kategori tampil, bukan angka id
        $pengaduan = Pengaduan::with(['warga', 'kategori'])
            ->when($status, fn ($query) => $query->where('status', $status))
            ->when($q, function ($query) use ($q) {
                $query->where(function ($w) use ($q) {
                    $w->where('judul', 'like', "%{$q}%")
                      ->orWhere('kode_tiket', 'like', "%{$q}%")
                      ->orWhereHas('warga', fn ($x) => $x->where('nama', 'like', "%{$q}%"));
                });
            })
            ->latest('tanggal')
            ->latest('id')
            ->get();

        return view('pengaduan.index', compact('pengaduan', 'q', 'status'));
    }

    public function create()
    {
        return view('pengaduan.create', [
            'warga'    => Warga::orderBy('nama')->get(),
            'kategori' => KategoriPengaduan::orderBy('nama_kategori')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['kode_tiket'] = $this->buatKodeTiket();

        Pengaduan::create($data);

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil ditambahkan.');
    }

    // Tampilan khusus Tema 8: detail pengaduan + semua tanggapan berurutan
    public function show(Pengaduan $pengaduan)
    {
        $pengaduan->load(['warga', 'kategori']);

        $tanggapan = $pengaduan->tanggapan()
            ->orderBy('tanggal')
            ->orderBy('id')
            ->get();

        return view('pengaduan.show', compact('pengaduan', 'tanggapan'));
    }

    public function edit(Pengaduan $pengaduan)
    {
        return view('pengaduan.edit', [
            'pengaduan' => $pengaduan,
            'warga'     => Warga::orderBy('nama')->get(),
            'kategori'  => KategoriPengaduan::orderBy('nama_kategori')->get(),
        ]);
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $pengaduan->update($request->validate($this->rules()));

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil diperbarui.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus.');
    }
}
