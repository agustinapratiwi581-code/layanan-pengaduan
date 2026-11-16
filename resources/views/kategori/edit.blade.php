
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title>
</head>
<body>
    <h2>Edit Kategori Pengaduan</h2>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Kategori</label><br>
        <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
        <br><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
        <br><br>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('kategori.index') }}">Kembali</a>
    </form>
</body>
</html>
