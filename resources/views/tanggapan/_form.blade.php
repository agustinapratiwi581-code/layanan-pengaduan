<div class="mb-3">
    <label class="form-label">Pengaduan</label>
    <select name="pengaduan_id" class="form-select @error('pengaduan_id') is-invalid @enderror">
        <option value="">-- Pilih Pengaduan --</option>
        @foreach($pengaduan as $p)
            <option value="{{ $p->id }}"
                {{ old('pengaduan_id', $tanggapan->pengaduan_id ?? ($pengaduanTerpilih ?? '')) == $p->id ? 'selected' : '' }}>
                {{ $p->kode_tiket }} — {{ $p->judul }}
            </option>
        @endforeach
    </select>
    @error('pengaduan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Petugas</label>
        <input type="text" name="petugas" class="form-control @error('petugas') is-invalid @enderror"
               value="{{ old('petugas', $tanggapan->petugas ?? '') }}">
        @error('petugas')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
               value="{{ old('tanggal', isset($tanggapan) ? $tanggapan->tanggal->format('Y-m-d') : now()->format('Y-m-d')) }}">
        @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Isi Tanggapan</label>
    <textarea name="isi_tanggapan" rows="5"
              class="form-control @error('isi_tanggapan') is-invalid @enderror">{{ old('isi_tanggapan', $tanggapan->isi_tanggapan ?? '') }}</textarea>
    @error('isi_tanggapan')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
