@extends('layouts.app')

@section('title', 'Data Pengaduan')
@section('page-title', 'Data Pengaduan')

@section('content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-3 p-md-4">

        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <h5 class="fw-bold mb-1">Data Pengaduan</h5>
                <p class="text-secondary small mb-0">Kelola laporan dan pengaduan masyarakat</p>
            </div>
            <a href="{{ route('pengaduan.create') }}" class="btn btn-primary rounded-3 px-3">
                <i class="bi bi-plus-lg me-1"></i> Tambah Pengaduan
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="GET" class="row g-2 mb-3">
            <div class="col-12 col-md-5">
                <input type="text" name="q" value="{{ $q }}" class="form-control"
                       placeholder="Cari kode tiket, judul, atau nama warga...">
            </div>
            <div class="col-6 col-md-3">
                <select name="status" class="form-select">
                    <option value="">Semua status</option>
                    @foreach(['baru' => 'Baru', 'diproses' => 'Diproses', 'selesai' => 'Selesai'] as $val => $label)
                        <option value="{{ $val }}" {{ $status === $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary"><i class="bi bi-search"></i> Cari</button>
                @if($q || $status)<a href="{{ route('pengaduan.index') }}" class="btn btn-link">Reset</a>@endif
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-secondary small">No</th>
                        <th class="text-secondary small">Kode Tiket</th>
                        <th class="text-secondary small">Tanggal</th>
                        <th class="text-secondary small">Judul</th>
                        <th class="text-secondary small">Warga</th>
                        <th class="text-secondary small">Kategori</th>
                        <th class="text-secondary small">Status</th>
                        <th class="text-secondary small text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengaduan as $item)
                        @php
                            $statusClass = match($item->status) {
                                'selesai'  => 'success',
                                'diproses' => 'warning',
                                default    => 'primary',
                            };
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-nowrap">{{ $item->kode_tiket }}</td>
                            <td class="text-nowrap">{{ $item->tanggal->format('d/m/Y') }}</td>
                            <td class="fw-semibold">{{ $item->judul }}</td>
                            <td>{{ $item->warga->nama ?? '-' }}</td>
                            <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                            <td>
                                <span class="badge bg-{{ $statusClass }}-subtle text-{{ $statusClass }}-emphasis rounded-pill px-3 py-2">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="text-center text-nowrap">
                                <a href="{{ route('pengaduan.show', $item->id) }}" class="btn btn-sm btn-info rounded-2">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <a href="{{ route('pengaduan.edit', $item->id) }}" class="btn btn-sm btn-warning rounded-2">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded-2"
                                        onclick="return confirm('Hapus pengaduan ini? Tanggapannya ikut terhapus.')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="text-center text-secondary py-4">Belum ada data pengaduan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
