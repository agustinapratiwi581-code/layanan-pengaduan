@extends('layouts.app')

@section('title', 'Edit Tanggapan')
@section('page-title', 'Edit Tanggapan')

@section('content')
<div class="card border-0 shadow-sm rounded-4 p-4">
    <h5 class="fw-bold mb-4">Edit Tanggapan</h5>

    <form action="{{ route('tanggapan.update', $tanggapan->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        @include('tanggapan._form')
        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('tanggapan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
