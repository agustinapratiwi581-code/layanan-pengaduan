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
                <h2 class="fw-bold">{{ $totalWarga }}</h2>
                <a href="{{ route('warga.index') }}">Lihat warga →</a>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="card stat-card shadow-sm">
                <p class="text-secondary mb-2">Pengaduan dan Tanggapan</p>
                <h2 class="fw-bold">
                    {{ $totalPengaduan }} / {{ $totalTanggapan }}
                </h2>
                <small class="text-muted">Pengaduan / Tanggapan</small>

                <div class="mt-2">
                    <a href="{{ route('pengaduan.index') }}">Lihat pengaduan →</a>
                    <br>
                    <a href="{{ route('tanggapan.index') }}">Lihat tanggapan →</a>
                </div>
            </div>
        </div>
    @endsection
