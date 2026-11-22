
@extends('layouts.app')

@section('title', 'Tambah Tanggapan')
@section('page-title', 'Tambah Tanggapan')

@section('content')
<div class="card border-0 shadow-sm p-4">
    <h4 class="fw-bold mb-4">Tambah Tanggapan</h4>

    <form action="{{ route('tanggapan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Pilih Pengaduan</label>
            <select name="pengaduan_id" class="form-select" required>
                <option value="">-- Pilih Pengaduan --</option>
                @foreach($pengaduans as $pengaduan)
                    <option value="{{ $pengaduan->id }}"
                        {{ old('pengaduan_id') == $pengaduan->id ? 'selected' : '' }}>
                        {{ $pengaduan->judul }}
                    </option>
                @endforeach
            </select>
            @error('pengaduan_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Isi Tanggapan</label>
            <textarea name="isi_tanggapan" class="form-control" rows="5"
                      required>{{ old('isi_tanggapan') }}</textarea>
            @error('isi_tanggapan')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('tanggapan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
