@extends('layout.sidebar')
<link rel="stylesheet" href="{{ asset('css/konten/form-input.css') }}">

@section('konten')
<body class="edit-page">
<div class="kotak">
    <div class="container mx-auto py-8">
        <div class="judul">
            <h2>Edit Riwayat Penugasan</h2>
        </div>
            <form action="{{ route('penugasan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nama Sekolah/Lokasi</label>
                    <input type="text" name="nama_sekolah" value="{{ old('nama_sekolah', $data->nama_sekolah) }}" required>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan', $data->jabatan) }}" required>
                </div>
                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input type="text" name="mata_pelajaran" value="{{ old('mata_pelajaran', $data->mata_pelajaran) }}">
                </div>
                <div class="form-group">
                    <label>Periode</label>
                    <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $data->tanggal_mulai) }}" required>
                    <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai', $data->tanggal_selesai) }}">
                </div>
                <div class="form-group">
                    <label>Nomor SK</label>
                    <input type="text" name="nomor_sk" value="{{ old('nomor_sk', $data->nomor_sk) }}">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status_penugasan" required>
                        <option value="Tetap" {{ $data->status_penugasan == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                        <option value="Honorer" {{ $data->status_penugasan == 'Honorer' ? 'selected' : '' }}>Honorer</option>
                        <option value="Kontrak" {{ $data->status_penugasan == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Upload SK Penugasan (PDF/JPG)</label>
                    <input type="file" name="sk_penugasan">
                </div>

                <button type="submit">Update Riwayat Penugasan</button>
                <a href="{{ url()->previous() }}" class="tombol">Batal</a>
            </form>
    </div>
</div>
</body>    
@endsection
