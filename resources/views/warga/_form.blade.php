<div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
           value="{{ old('nama', $warga->nama ?? '') }}">
    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">No. HP</label>
    <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
           value="{{ old('no_hp', $warga->no_hp ?? '') }}">
    @error('no_hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">Alamat</label>
    <textarea name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $warga->alamat ?? '') }}</textarea>
    @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">Kelurahan</label>
    <input type="text" name="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror"
           value="{{ old('kelurahan', $warga->kelurahan ?? '') }}">
    @error('kelurahan')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
