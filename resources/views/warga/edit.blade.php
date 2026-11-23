@extends('layouts.app')

@section('title', 'Edit Warga')
@section('page-title', 'Edit Warga')

@section('content')
<form action="{{ route('warga.update', $warga->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>NIK</label>
        <input type="text" name="nik" value="{{ $warga->nik }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $warga->nama }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required>{{ $warga->alamat }}</textarea>
    </div>

    <div class="mb-3">
        <label>No. Telepon</label>
        <input type="text" name="no_telepon" value="{{ $warga->no_telepon }}" class="form-control" required>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection