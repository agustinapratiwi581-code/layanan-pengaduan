
@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <h3 class="fw-bold mb-2">Selamat Datang, Admin!</h3>
    <p class="text-secondary mb-4">Sistem Layanan Pengaduan Masyarakat</p>

    <div class="row g-3">
        <div class="col-md-6 col-xl-4">
            <div class="card stat-card shadow-sm">
                <p class="text-secondary mb-2">Total Kategori Pengaduan</p>
                <h2 class="fw-bold">{{ $totalKategori }}</h2>
                <a href="{{ route('kategori.index') }}">Lihat kategori →</a>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="card stat-card shadow-sm">
                <p class="text-secondary mb-2">Data Warga</p>
                <h2 class="fw-bold">Segera tersedia</h2>
                <small class="text-muted">Menunggu integrasi Anggota 2</small>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="card stat-card shadow-sm">
                <p class="text-secondary mb-2">Pengaduan dan Tanggapan</p>
                <h2 class="fw-bold">Segera tersedia</h2>
                <small class="text-muted">Menunggu integrasi anggota kelompok</small>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mt-4 p-4">
        <h5>Informasi Aplikasi</h5>
        <p class="text-secondary mb-0">
            Aplikasi ini digunakan untuk mengelola kategori, data warga,
            pengaduan masyarakat, dan tanggapan.
        </p>
    </div>
@endsection
