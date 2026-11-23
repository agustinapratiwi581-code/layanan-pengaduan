
@extends('layouts.app')

@section('title', 'Data Tanggapan')
@section('page-title', 'Data Tanggapan')

@section('content')

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-3 p-md-4">

        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <h5 class="fw-bold mb-1">Data Tanggapan</h5>
                <p class="text-secondary small mb-0">Kelola tanggapan terhadap laporan masyarakat</p>
            </div>
            <a href="{{ route('tanggapan.create') }}" class="btn btn-primary rounded-3 px-3">
                <i class="bi bi-plus-lg me-1"></i> Tambah Tanggapan
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
                        <th class="text-secondary small">Pengaduan</th>
                        <th class="text-secondary small">Isi Tanggapan</th>
                        <th class="text-secondary small text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tanggapans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold">
                                {{ $item->pengaduan->judul ?? 'Pengaduan tidak ditemukan' }}
                            </td>
                            <td>{{ $item->isi_tanggapan }}</td>
                            <td class="text-center text-nowrap">
                                <a href="{{ route('tanggapan.edit', $item->id) }}"
                                   class="btn btn-sm btn-warning rounded-2">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <form action="{{ route('tanggapan.destroy', $item->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded-2"
                                        onclick="return confirm('Hapus tanggapan ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-secondary py-4">
                                Belum ada tanggapan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
