@extends('layouts.app')

@section('title', 'Edit Warga')
@section('page-title', 'Edit Warga')

@section('content')
<div class="card border-0 shadow-sm rounded-4 p-4">
    <h5 class="fw-bold mb-4">Edit Data Warga</h5>

    <form action="{{ route('warga.update', $warga->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        @include('warga._form')
        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
