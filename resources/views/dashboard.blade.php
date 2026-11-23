
@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<div class="mb-4">
    <h3 class="fw-bold mb-1">Selamat Datang, Admin!</h3>
    <p class="text-secondary mb-0">
        Sistem Informasi Layanan Pengaduan Masyarakat
    </p>
</div>

<div class="row g-4">

    <!-- KATEGORI -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-secondary fw-semibold">Kategori Pengaduan</span>
                    <div class="rounded-3 p-3" style="background:#e8f0fc;color:#3976c6;">
                        <i class="bi bi-folder-fill fs-4"></i>
                    </div>
                </div>
                <h2 class="fw-bold mb-3">{{ $totalKategori }}</h2>
                <a href="{{ route('kategori.index') }}" class="text-decoration-none small fw-semibold">
                    Lihat kategori <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- WARGA -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-secondary fw-semibold">Data Warga</span>
                    <div class="rounded-3 p-3" style="background:#e5f6ef;color:#23966b;">
                        <i class="bi bi-people-fill fs-4"></i>
                    </div>
                </div>
                <h2 class="fw-bold mb-3">{{ $totalWarga }}</h2>
                <a href="{{ route('warga.index') }}" class="text-decoration-none small fw-semibold">
                    Lihat warga <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- PENGADUAN -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-secondary fw-semibold">Data Pengaduan</span>
                    <div class="rounded-3 p-3" style="background:#fff2df;color:#dc9229;">
                        <i class="bi bi-chat-square-text-fill fs-4"></i>
                    </div>
                </div>
                <h2 class="fw-bold mb-3">{{ $totalPengaduan }}</h2>
                <a href="{{ route('pengaduan.index') }}" class="text-decoration-none small fw-semibold">
                    Lihat pengaduan <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- TANGGAPAN -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-secondary fw-semibold">Data Tanggapan</span>
                    <div class="rounded-3 p-3" style="background:#f0eaff;color:#7954bd;">
                        <i class="bi bi-reply-all-fill fs-4"></i>
                    </div>
                </div>
                <h2 class="fw-bold mb-3">{{ $totalTanggapan }}</h2>
                <a href="{{ route('tanggapan.index') }}" class="text-decoration-none small fw-semibold">
                    Lihat tanggapan <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

</div>

<!-- INFORMASI -->
<div class="card border-0 shadow-sm rounded-4 mt-4">
    <div class="card-body p-4">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-3 p-3" style="background:#e8f0fc;color:#3976c6;">
                <i class="bi bi-buildings fs-3"></i>
            </div>
            <div>
                <h5 class="fw-bold mb-1">Layanan Pengaduan Masyarakat</h5>
                <p class="text-secondary mb-0 small">
                    Platform pengelolaan data warga, kategori, pengaduan, dan tanggapan
                    untuk mendukung pelayanan masyarakat.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
