<div class="mb-3">
    <label class="form-label">Nama Kategori</label>
    <input type="text" name="nama_kategori"
           class="form-control @error('nama_kategori') is-invalid @enderror"
           value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}">
    @error('nama_kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">Bidang Penanggung Jawab</label>
    <input type="text" name="bidang_penanggung_jawab"
           class="form-control @error('bidang_penanggung_jawab') is-invalid @enderror"
           value="{{ old('bidang_penanggung_jawab', $kategori->bidang_penanggung_jawab ?? '') }}">
    @error('bidang_penanggung_jawab')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
