@extends('layouts.app')

@section('title', 'Detail Pengaduan')
@section('page-title', 'Detail Pengaduan')

@section('content')
@php
    $statusClass = match($pengaduan->status) {
        'selesai'  => 'success',
        'diproses' => 'warning',
        default    => 'primary',
    };
@endphp

<div class="card border-0 shadow-sm rounded-4 mb-4">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-sm-row justify-content-between gap-2 mb-3">
            <div>
                <div class="text-secondary small">{{ $pengaduan->kode_tiket }}</div>
                <h4 class="fw-bold mb-0">{{ $pengaduan->judul }}</h4>
            </div>
            <div>
                <span class="badge bg-{{ $statusClass }}-subtle text-{{ $statusClass }}-emphasis rounded-pill px-3 py-2">
                    {{ ucfirst($pengaduan->status) }}
                </span>
            </div>
        </div>

        <dl class="row mb-3">
            <dt class="col-sm-3 text-secondary fw-normal">Tanggal</dt>
            <dd class="col-sm-9">{{ $pengaduan->tanggal->format('d F Y') }}</dd>

            <dt class="col-sm-3 text-secondary fw-normal">Warga</dt>
            <dd class="col-sm-9">
                {{ $pengaduan->warga->nama }}
                <span class="text-secondary">· {{ $pengaduan->warga->no_hp }} · Kel. {{ $pengaduan->warga->kelurahan }}</span>
            </dd>

            <dt class="col-sm-3 text-secondary fw-normal">Kategori</dt>
            <dd class="col-sm-9">
                {{ $pengaduan->kategori->nama_kategori }}
                <span class="text-secondary">({{ $pengaduan->kategori->bidang_penanggung_jawab }})</span>
            </dd>
        </dl>

        <h6 class="fw-bold">Isi pengaduan</h6>
        <p class="mb-0" style="white-space: pre-line;">{{ $pengaduan->isi }}</p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Tanggapan ({{ $tanggapan->count() }})</h5>
            <a href="{{ route('tanggapan.create', ['pengaduan_id' => $pengaduan->id]) }}"
               class="btn btn-sm btn-primary rounded-3">
                <i class="bi bi-plus-lg me-1"></i> Tambah Tanggapan
            </a>
        </div>

        @forelse($tanggapan as $t)
            <div class="border-start border-3 border-primary ps-3 mb-3">
                <div class="small text-secondary">
                    {{ $t->tanggal->format('d F Y') }} · <span class="fw-semibold">{{ $t->petugas }}</span>
                </div>
                <div>{{ $t->isi_tanggapan }}</div>
            </div>
        @empty
            <p class="text-secondary mb-0">Belum ada tanggapan untuk pengaduan ini.</p>
        @endforelse
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('pengaduan.edit', $pengaduan->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
