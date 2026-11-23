@extends('layouts.app')

@section('title', 'Tambah Tanggapan')
@section('page-title', 'Tambah Tanggapan')

@section('content')
<div class="card border-0 shadow-sm rounded-4 p-4">
    <h5 class="fw-bold mb-4">Tambah Tanggapan</h5>

    <form action="{{ route('tanggapan.store') }}" method="POST" novalidate>
        @csrf
        @include('tanggapan._form')
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('tanggapan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
