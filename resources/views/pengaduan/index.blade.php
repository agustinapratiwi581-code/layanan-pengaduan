
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

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-secondary small">No</th>
                        <th class="text-secondary small">Judul</th>
                        <th class="text-secondary small">Kategori</th>
                        <th class="text-secondary small">Pelapor</th>
                        <th class="text-secondary small">Status</th>
                        <th class="text-secondary small text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengaduans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $item->judul }}</td>
                            <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                            <td>{{ $item->user->name ?? '-' }}</td>
                            <td>
                                @php
                                    $statusClass = match($item->status) {
                                        'selesai' => 'success',
                                        'diproses' => 'warning',
                                        default => 'secondary',
                                    };
                                @endphp
                                <span class="badge bg-{{ $statusClass }}-subtle text-{{ $statusClass }} rounded-pill px-3 py-2">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="text-center text-nowrap">
                                <a href="{{ route('pengaduan.edit', $item->id) }}"
                                   class="btn btn-sm btn-warning rounded-2">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <form action="{{ route('pengaduan.destroy', $item->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded-2"
                                        onclick="return confirm('Hapus pengaduan ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-4">
                                Belum ada data pengaduan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
