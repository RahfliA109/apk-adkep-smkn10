@extends('sidebar.sidebar')
<link rel="stylesheet" href="{{ asset('css/form-input.css') }}">
<title>Biodata</title>

@section('konten')
    <div class="container mx-auto py-8">
        <h2>Biodata Diri</h2>
        <form action="/datadiri" method="POST" id="biodataForm" enctype="multipart/form-data">
            @csrf
            <!-- Data Pribadi -->
            <div class="form-group">
                <label>Nama Lengkap (Sesuai KTP)</label>
                <input type="text" name="nama" value="{{ $data->nama ?? '' }}" {{ $data ? 'readonly' : '' }} required>
            </div>
            <div class="form-group">
                <label>NIK</label>
                <input type="text" name="nik" value="{{ $data->nik ?? '' }}" {{ $data ? 'readonly' : '' }} required>
            </div>
            <div class="form-group">
                <label>NUPTK/NIP</label>
                <input type="text" name="nuptk_nip" value="{{ $data->nuptk_nip ?? '' }}" {{ $data ? 'readonly' : '' }} required>
            </div>
            <div class="form-group">
                <label>Tempat, Tanggal Lahir</label>
                <input type="text" name="tempat_lahir" value="{{ $data->tempat_lahir ?? '' }}" {{ $data ? 'readonly' : '' }} required>
                <input type="date" name="tanggal_lahir" value="{{ $data->tanggal_lahir ?? '' }}" {{ $data ? 'readonly' : '' }} required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" {{ $data ? 'disabled' : '' }} required>
                    <option value="Laki-laki" {{ (isset($data) && $data->jenis_kelamin == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ (isset($data) && $data->jenis_kelamin == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Agama</label>
                <input type="text" name="agama" value="{{ $data->agama ?? '' }}" {{ $data ? 'readonly' : '' }} required>
            </div>
            <div class="form-group">
                <label>Status Kawin</label>
                <select name="status_kawin" {{ $data ? 'disabled' : '' }} required>
                    <option value="Belum Kawin" {{ (isset($data) && $data->status_kawin == 'Belum Kawin') ? 'selected' : '' }}>Belum Kawin</option>
                    <option value="Kawin" {{ (isset($data) && $data->status_kawin == 'Kawin') ? 'selected' : '' }}>Kawin</option>
                    <option value="Duda/Janda" {{ (isset($data) && $data->status_kawin == 'Duda/Janda') ? 'selected' : '' }}>Duda/Janda</option>
                </select>
            </div>

            <!-- Kontak & Alamat -->
            <div class="form-group">
                <label>Alamat KTP</label>
                <textarea name="alamat_ktp" {{ $data ? 'readonly' : '' }} required>{{ $data->alamat_ktp ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label>Nomor Telepon/HP</label>
                <input type="tel" name="no_hp" value="{{ $data->no_hp ?? '' }}" {{ $data ? 'readonly' : '' }} required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ $data->email ?? '' }}" {{ $data ? 'readonly' : '' }} required>
            </div>

            <!-- Dokumen -->
            <div class="form-group">
                <label>Upload Foto (Format: JPG, Max 2MB)</label>
                @if ($data && $data->foto)
                    <p>Sudah diupload: <a href="{{ asset('storage/' . $data->foto) }}" target="_blank">Lihat Foto</a></p>
                @else
                    <input type="file" name="foto" accept="image/jpeg" {{ $data ? 'disabled' : '' }}>
                @endif
            </div>
            <div class="form-group">
                <label>Upload Scan KTP</label>
                @if ($data && $data->scan_ktp)
                    <p>Sudah diupload: <a href="{{ asset('storage/' . $data->scan_ktp) }}" target="_blank">Lihat KTP</a></p>
                @else
                    <input type="file" name="scan_ktp" accept="application/pdf, image/*" {{ $data ? 'disabled' : '' }}>
                @endif
            </div>

            @if (!$data)
                <button type="submit">Simpan Biodata</button>
            @endif
        </form>
    </div>
    @if ($data)
    <div class="flex gap-4 mt-4">
        <a href="{{ route('datadiri.edit', $data->id) }}" class="btn-edit">Edit</a>
        <form action="{{ route('datadiri.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus biodata ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">Hapus</button>
        </form>
    </div>
    @endif
@endsection

