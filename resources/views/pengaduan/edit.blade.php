
@extends('layouts.app')

@section('title', 'Edit Pengaduan')
@section('page-title', 'Edit Pengaduan')

@section('content')
<div class="card border-0 shadow-sm p-4">
    <h4 class="fw-bold mb-4">Edit Pengaduan</h4>

    <form action="{{ route('pengaduan.update', $pengaduan->id) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Pelapor</label>
            <select name="user_id" class="form-select" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}"
                        {{ $pengaduan->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori_pengaduan_id" class="form-select" required>
                @foreach($kategori as $item)
                    <option value="{{ $item->id }}"
                        {{ $pengaduan->kategori_pengaduan_id == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Judul Pengaduan</label>
            <input type="text" name="judul" class="form-control"
                   value="{{ $pengaduan->judul }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Isi Pengaduan</label>
            <textarea name="isi_pengaduan" class="form-control"
                      rows="5" required>{{ $pengaduan->isi_pengaduan }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto baru (opsional)</label>
            <input type="file" name="foto" class="form-control">
            @if($pengaduan->foto)
                <small class="text-muted">Foto saat ini: {{ $pengaduan->foto }}</small>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                @foreach(['menunggu', 'diproses', 'selesai'] as $status)
                    <option value="{{ $status }}"
                        {{ $pengaduan->status == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('pengaduan.index') }}"
           class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
