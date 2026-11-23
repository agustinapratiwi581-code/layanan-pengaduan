@extends('layouts.app')

@section('title', 'Tambah Pengaduan')
@section('page-title', 'Tambah Pengaduan')

@section('content')
<div class="card border-0 shadow-sm rounded-4 p-4">
    <h5 class="fw-bold mb-1">Tambah Pengaduan</h5>
    <p class="text-secondary small mb-4">Kode tiket dibuat otomatis setelah disimpan.</p>

    <form action="{{ route('pengaduan.store') }}" method="POST" novalidate>
        @csrf
        @include('pengaduan._form')
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
