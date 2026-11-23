<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Warga (Pelapor)</label>
        <select name="warga_id" class="form-select @error('warga_id') is-invalid @enderror">
            <option value="">-- Pilih Warga --</option>
            @foreach($warga as $w)
                <option value="{{ $w->id }}"
                    {{ old('warga_id', $pengaduan->warga_id ?? '') == $w->id ? 'selected' : '' }}>
                    {{ $w->nama }} — {{ $w->kelurahan }}
                </option>
            @endforeach
        </select>
        @error('warga_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori_pengaduan_id" class="form-select @error('kategori_pengaduan_id') is-invalid @enderror">
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategori as $k)
                <option value="{{ $k->id }}"
                    {{ old('kategori_pengaduan_id', $pengaduan->kategori_pengaduan_id ?? '') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kategori }}
                </option>
            @endforeach
        </select>
        @error('kategori_pengaduan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
               value="{{ old('tanggal', isset($pengaduan) ? $pengaduan->tanggal->format('Y-m-d') : now()->format('Y-m-d')) }}">
        @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            @foreach(['baru' => 'Baru', 'diproses' => 'Diproses', 'selesai' => 'Selesai'] as $val => $label)
                <option value="{{ $val }}"
                    {{ old('status', $pengaduan->status ?? 'baru') == $val ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Judul</label>
    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
           value="{{ old('judul', $pengaduan->judul ?? '') }}">
    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">Isi Pengaduan</label>
    <textarea name="isi" rows="5" class="form-control @error('isi') is-invalid @enderror">{{ old('isi', $pengaduan->isi ?? '') }}</textarea>
    @error('isi')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
