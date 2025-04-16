@extends('layout.sidebar')

<title>Biodata</title>

@section('konten')
<link rel="stylesheet" href="{{ asset('css/form-input.css') }}">

    <div class="container mx-auto py-8">
        <h2>Biodata Diri</h2>
        <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <!-- Data Pribadi -->
            <div class="form-group">
                <label>Nama Lengkap (Sesuai KTP)</label>
                <input type="text" name="nama" required>
            </div>
            <div class="form-group">
                <label>NIK</label>
                <input type="text" name="nik" required>
            </div>
            <div class="form-group">
                <label>NUPTK/NIP</label>
                <input type="text" name="nuptk_nip" required>
            </div>
            <div class="form-group">
                <label>Tempat, Tanggal Lahir</label>
                <input type="text" name="tempat_lahir" required>
                <input type="date" name="tanggal_lahir" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Agama</label>
                <input type="text" name="agama" required>
            </div>
            <div class="form-group">
                <label>Status Kawin</label>
                <select name="status_kawin" required>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Duda/Janda">Duda/Janda</option>
                </select>
            </div>

            <!-- Kontak & Alamat -->
            <div class="form-group">
                <label>Alamat KTP</label>
                <textarea name="alamat_ktp" required></textarea>
            </div>
            <div class="form-group">
                <label>Nomor Telepon/HP</label>
                <input type="tel" name="no_hp" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <!-- Dokumen -->
            <div class="form-group">
                <label>Upload Foto (Format: JPG, Max 2MB)</label>
                <input type="file" name="foto" accept="image/jpeg">
            </div>
            <div class="form-group">
                <label>Upload Scan KTP</label>
                <input type="file" name="scan_ktp" accept="application/pdf, image/*">
            </div>

            <button type="submit">Simpan Biodata</button>
        </form>
    </div>
@endsection