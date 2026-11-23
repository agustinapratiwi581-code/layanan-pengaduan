@extends('layouts.app')

@section('title', 'Tambah Kategori')
@section('page-title', 'Tambah Kategori')

@section('content')
<div class="card border-0 shadow-sm rounded-4 p-4">
    <h5 class="fw-bold mb-4">Tambah Kategori Pengaduan</h5>

    <form action="{{ route('kategori.store') }}" method="POST" novalidate>
        @csrf
        @include('kategori._form')
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
