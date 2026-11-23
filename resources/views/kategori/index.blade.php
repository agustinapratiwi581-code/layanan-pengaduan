@extends('layouts.app')

@section('title', 'Kategori Pengaduan')
@section('page-title', 'Kategori Pengaduan')

@section('content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-3 p-md-4">

        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <h5 class="fw-bold mb-1">Data Kategori Pengaduan</h5>
                <p class="text-secondary small mb-0">Kelola kategori dan bidang penanggung jawab</p>
            </div>
            <a href="{{ route('kategori.create') }}" class="btn btn-primary rounded-3 px-3">
                <i class="bi bi-plus-lg me-1"></i> Tambah Kategori
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
                       placeholder="Cari nama kategori atau bidang...">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary"><i class="bi bi-search"></i> Cari</button>
                @if($q)<a href="{{ route('kategori.index') }}" class="btn btn-link">Reset</a>@endif
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-secondary small">No</th>
                        <th class="text-secondary small">Nama Kategori</th>
                        <th class="text-secondary small">Bidang Penanggung Jawab</th>
                        <th class="text-secondary small">Jumlah Pengaduan</th>
                        <th class="text-secondary small text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategori as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $item->nama_kategori }}</td>
                            <td>{{ $item->bidang_penanggung_jawab }}</td>
                            <td>{{ $item->pengaduan_count }}</td>
                            <td class="text-center text-nowrap">
                                <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-sm btn-warning rounded-2">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded-2"
                                        onclick="return confirm('Hapus kategori ini? Pengaduan di dalamnya ikut terhapus.')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-secondary py-4">Belum ada data kategori.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
