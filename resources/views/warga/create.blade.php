@extends('layouts.app')

@section('title', 'Tambah Warga')
@section('page-title', 'Tambah Warga')

@section('content')
<form action="{{ route('warga.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>NIK</label>
        <input type="text" name="nik" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label>No. Telepon</label>
        <input type="text" name="no_telepon" class="form-control" required>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection