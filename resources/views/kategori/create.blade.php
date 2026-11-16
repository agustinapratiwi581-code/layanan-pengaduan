
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
</head>
<body>
    <h2>Tambah Kategori Pengaduan</h2>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf

        <label>Nama Kategori</label><br>
        <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}" required>
        <br><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi">{{ old('deskripsi') }}</textarea>
        <br><br>

        <button type="submit">Simpan</button>
        <a href="{{ route('kategori.index') }}">Kembali</a>
    </form>
</body>
</html>
