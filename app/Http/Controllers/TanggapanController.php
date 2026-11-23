<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    private function rules(): array
    {
        return [
            'pengaduan_id'  => 'required|exists:pengaduan,id',
            'petugas'       => 'required|string|max:255',
            'tanggal'       => 'required|date',
            'isi_tanggapan' => 'required|string',
        ];
    }

    public function index(Request $request)
    {
        $q = $request->query('q');

        $tanggapan = Tanggapan::with('pengaduan')
            ->when($q, function ($query) use ($q) {
                $query->where(function ($w) use ($q) {
                    $w->where('petugas', 'like', "%{$q}%")
                      ->orWhere('isi_tanggapan', 'like', "%{$q}%")
                      ->orWhereHas('pengaduan', fn ($x) => $x->where('judul', 'like', "%{$q}%")
                          ->orWhere('kode_tiket', 'like', "%{$q}%"));
                });
            })
            ->latest('tanggal')
            ->latest('id')
            ->get();

        return view('tanggapan.index', compact('tanggapan', 'q'));
    }

    public function create(Request $request)
    {
        return view('tanggapan.create', [
            'pengaduan'         => Pengaduan::orderByDesc('id')->get(),
            'pengaduanTerpilih' => $request->query('pengaduan_id'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $tanggapan = Tanggapan::create($data);

        // Tanggapan pertama otomatis memindahkan status "baru" -> "diproses"
        $pengaduan = $tanggapan->pengaduan;
        if ($pengaduan->status === 'baru') {
            $pengaduan->update(['status' => 'diproses']);
        }

        return redirect()->route('tanggapan.index')
            ->with('success', 'Tanggapan berhasil ditambahkan.');
    }

    public function edit(Tanggapan $tanggapan)
    {
        return view('tanggapan.edit', [
            'tanggapan' => $tanggapan,
            'pengaduan' => Pengaduan::orderByDesc('id')->get(),
        ]);
    }

    public function update(Request $request, Tanggapan $tanggapan)
    {
        $tanggapan->update($request->validate($this->rules()));

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
