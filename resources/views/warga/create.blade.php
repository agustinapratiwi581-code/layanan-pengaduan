@extends('layouts.app')

@section('title', 'Tambah Warga')
@section('page-title', 'Tambah Warga')

@section('content')
<div class="card border-0 shadow-sm rounded-4 p-4">
    <h5 class="fw-bold mb-4">Tambah Data Warga</h5>

    <form action="{{ route('warga.store') }}" method="POST" novalidate>
        @csrf
        @include('warga._form')
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
