@extends('layouts.app')

@section('title', 'Edit Pengaduan')
@section('page-title', 'Edit Pengaduan')

@section('content')
<div class="card border-0 shadow-sm rounded-4 p-4">
    <h5 class="fw-bold mb-1">Edit Pengaduan</h5>
    <p class="text-secondary small mb-4">Kode tiket: <strong>{{ $pengaduan->kode_tiket }}</strong></p>

    <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        @include('pengaduan._form')
        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
