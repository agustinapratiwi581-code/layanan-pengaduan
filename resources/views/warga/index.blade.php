@extends('layouts.app')

@section('title', 'Data Warga')
@section('page-title', 'Data Warga')

@section('content')
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-3 p-md-4">

        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <h5 class="fw-bold mb-1">Data Warga</h5>
                <p class="text-secondary small mb-0">Kelola data warga pelapor</p>
            </div>
            <a href="{{ route('warga.create') }}" class="btn btn-primary rounded-3 px-3">
                <i class="bi bi-plus-lg me-1"></i> Tambah Warga
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
                       placeholder="Cari nama, kelurahan, atau no. HP...">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary"><i class="bi bi-search"></i> Cari</button>
                @if($q)<a href="{{ route('warga.index') }}" class="btn btn-link">Reset</a>@endif
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-secondary small">No</th>
                        <th class="text-secondary small">Nama</th>
                        <th class="text-secondary small">No. HP</th>
                        <th class="text-secondary small">Alamat</th>
                        <th class="text-secondary small">Kelurahan</th>
                        <th class="text-secondary small">Pengaduan</th>
                        <th class="text-secondary small text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($warga as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $item->nama }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->kelurahan }}</td>
                            <td>{{ $item->pengaduan_count }}</td>
                            <td class="text-center text-nowrap">
                                <a href="{{ route('warga.edit', $item->id) }}" class="btn btn-sm btn-warning rounded-2">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('warga.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded-2"
                                        onclick="return confirm('Hapus data warga ini? Pengaduannya ikut terhapus.')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-secondary py-4">Belum ada data warga.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
