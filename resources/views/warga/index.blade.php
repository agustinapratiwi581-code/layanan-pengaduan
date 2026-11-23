@extends('layouts.app')

@section('title', 'Data Warga')
@section('page-title', 'Data Warga')

@section('content')
    <div class="card border-0 shadow-sm p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Data Warga</h4>
            <a href="{{ route('warga.create') }}" class="btn btn-primary">
                + Tambah Warga
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($wargas as $warga)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $warga->nik }}</td>
                        <td>{{ $warga->nama }}</td>
                        <td>{{ $warga->alamat }}</td>
                        <td>{{ $warga->no_telepon }}</td>
                        <td>
                            <a href="{{ route('warga.edit', $warga->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('warga.destroy', $warga->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data warga.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection
