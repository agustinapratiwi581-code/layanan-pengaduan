
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kategori Pengaduan</title>
    <style>
        body { font-family: Arial; margin: 40px; background: #f4f5f7; }
        .container { background: white; padding: 25px; border-radius: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background: #343a40; color: white; }
        a, button { padding: 8px 12px; border: none; border-radius: 5px; text-decoration: none; cursor: pointer; }
        .add { background: #198754; color: white; }
        .edit { background: #ffc107; color: black; }
        .delete { background: #dc3545; color: white; }
        .success { color: green; margin: 15px 0; }
    </style>
</head>
<body>
<div class="container">
    <h2>Data Kategori Pengaduan</h2>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <a href="{{ route('kategori.create') }}" class="add">+ Tambah Kategori</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategori as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $item->id) }}" class="edit">Edit</a>
                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Belum ada data kategori.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
