@extends('layouts.app')

@section('title', 'Edit Kategori')
@section('page-title', 'Edit Kategori')

@section('content')
<div class="card border-0 shadow-sm rounded-4 p-4">
    <h5 class="fw-bold mb-4">Edit Kategori Pengaduan</h5>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        @include('kategori._form')
        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
