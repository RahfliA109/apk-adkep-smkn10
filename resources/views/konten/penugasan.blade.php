@extends('sidebar.sidebar')
<link rel="stylesheet" href="css/form-input.css">
<title>biodata</title>

@section('konten')
    <div class="container mx-auto py-8">
        <h2>Riwayat Penugasan</h2>
        <form id="riwayatPenugasanForm" method="POST" action="{{ route('penugasan.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama Sekolah/Lokasi</label>
                <input type="text" name="nama_sekolah" required>
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan" required>
            </div>
            <div class="form-group">
                <label>Mata Pelajaran</label>
                <input type="text" name="mata_pelajaran">
            </div>
            <div class="form-group">
                <label>Periode</label>
                <input type="date" name="tanggal_mulai" required>
                <input type="date" name="tanggal_selesai">
            </div>
            <div class="form-group">
                <label>Nomor SK</label>
                <input type="text" name="nomor_sk">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status_penugasan" required>
                    <option value="Tetap">Tetap</option>
                    <option value="Honorer">Honorer</option>
                    <option value="Kontrak">Kontrak</option>
                </select>
            </div>
            <div class="form-group">
                <label>Upload SK Penugasan (PDF/JPG)</label>
                <input type="file" name="sk_penugasan">
            </div>

            <button type="submit">Simpan Riwayat Penugasan</button>
        </form>
    </div>
@endsection
