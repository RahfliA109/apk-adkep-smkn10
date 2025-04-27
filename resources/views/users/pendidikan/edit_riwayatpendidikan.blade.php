@extends('layout.sidebar')
<link rel="stylesheet" href="{{ asset('css/konten/form-input.css') }}">
<title>Edit Riwayat Pendidikan</title>

@section('konten')
<body class="edit-page">
<div class="kotak">
<div class="container mx-auto py-8">
    <div class="judul">
    <h2>Edit Riwayat Pendidikan</h2>
    </div>

    <form action="{{ route('riwayatPendidikan.update', $pendidikan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Pendidikan Formal -->
        <div class="form-group">
            <label>Jenjang Pendidikan</label>
            <select name="jenjang_pendidikan" required>
                <option value="SD" {{ $pendidikan->jenjang_pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                <option value="SMP" {{ $pendidikan->jenjang_pendidikan == 'SMP' ? 'selected' : '' }}>SMP</option>
                <option value="SMA/SMK" {{ $pendidikan->jenjang_pendidikan == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                <option value="D3" {{ $pendidikan->jenjang_pendidikan == 'D3' ? 'selected' : '' }}>D3</option>
                <option value="S1/D4" {{ $pendidikan->jenjang_pendidikan == 'S1/D4' ? 'selected' : '' }}>S1/D4</option>
                <option value="S2" {{ $pendidikan->jenjang_pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                <option value="S3" {{ $pendidikan->jenjang_pendidikan == 'S3' ? 'selected' : '' }}>S3</option>
            </select>
        </div>

        <div class="form-group">
            <label>Nama Institusi</label>
            <input type="text" name="nama_institusi" value="{{ $pendidikan->nama_institusi }}" required>
        </div>

        <div class="form-group">
            <label>Jurusan</label>
            <input type="text" name="jurusan" value="{{ $pendidikan->jurusan }}">
        </div>

        <div class="form-group">
            <label>Tahun Lulus</label>
            <input type="number" name="tahun_lulus" value="{{ $pendidikan->tahun_lulus }}" min="1900" max="2099" required>
        </div>

        <!-- Pendidikan Non-Formal -->
        <div class="form-group">
            <label>Nama Pelatihan/Sertifikasi</label>
            <input type="text" name="nama_pelatihan" value="{{ $pendidikan->nama_pelatihan }}">
        </div>

        <div class="form-group">
            <label>Penyelenggara</label>
            <input type="text" name="penyelenggara_pelatihan" value="{{ $pendidikan->penyelenggara_pelatihan }}">
        </div>

        <div class="form-group">
            <label>Tahun Pelatihan</label>
            <input type="number" name="tahun_pelatihan" value="{{ $pendidikan->tahun_pelatihan }}" min="1900" max="2099">
        </div>

        <!-- Dokumen -->
        <div class="form-group">
            <label>Upload Ijazah (PDF/JPG)</label>
            <input type="file" name="ijazah">
        </div>

        <div class="form-group">
            <label>Upload Sertifikat Pelatihan (Opsional)</label>
            <input type="file" name="sertifikat_pelatihan">
        </div>

        <button type="submit">Update Riwayat Pendidikan</button>
        <a href="{{ url()->previous() }}" class="tombol">Batal</a>
    </form>
</div>
</div>
</body>
@endsection
