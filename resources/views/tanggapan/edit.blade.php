
@extends('layouts.app')

@section('title', 'Edit Tanggapan')
@section('page-title', 'Edit Tanggapan')

@section('content')
<div class="card border-0 shadow-sm p-4">
    <h4 class="fw-bold mb-4">Edit Tanggapan</h4>

    <form action="{{ route('tanggapan.update', $tanggapan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Pilih Pengaduan</label>
            <select name="pengaduan_id" class="form-select" required>
                @foreach($pengaduans as $pengaduan)
                    <option value="{{ $pengaduan->id }}"
                        {{ old('pengaduan_id', $tanggapan->pengaduan_id) == $pengaduan->id ? 'selected' : '' }}>
                        {{ $pengaduan->judul }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Isi Tanggapan</label>
            <textarea name="isi_tanggapan" class="form-control" rows="5"
                      required>{{ old('isi_tanggapan', $tanggapan->isi_tanggapan) }}</textarea>
        </div>

        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('tanggapan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
