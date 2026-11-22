
@extends('layouts.app')

@section('title', 'Tambah Pengaduan')
@section('page-title', 'Tambah Pengaduan')

@section('content')
<div class="card border-0 shadow-sm p-4">
    <h4 class="fw-bold mb-4">Tambah Pengaduan</h4>

    <form action="{{ route('pengaduan.store') }}" method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Pelapor</label>
            <select name="user_id" class="form-select" required>
                <option value="">-- Pilih Pelapor --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori_pengaduan_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Judul Pengaduan</label>
            <input type="text" name="judul" class="form-control"
                   value="{{ old('judul') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Isi Pengaduan</label>
            <textarea name="isi_pengaduan" class="form-control"
                      rows="5" required>{{ old('isi_pengaduan') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto (opsional)</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="menunggu">Menunggu</option>
                <option value="diproses">Diproses</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('pengaduan.index') }}"
           class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
