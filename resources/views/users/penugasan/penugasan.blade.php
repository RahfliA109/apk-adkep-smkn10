@extends('layout.sidebar')
<link rel="stylesheet" href="{{ asset('css/konten/form-input.css') }}">

@section('konten')
<div class="kotak">
    <div class="judul">
        <h1>Riwayat Penugasan</h1>
    </div>

    <form action="{{ route('penugasan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_sekolah">Nama Sekolah</label>
            <input type="text" id="nama_sekolah" name="nama_sekolah" required class="form-control">
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" id="jabatan" name="jabatan" required class="form-control">
        </div>

        <div class="form-group">
            <label for="mata_pelajaran">Mata Pelajaran</label>
            <input type="text" id="mata_pelajaran" name="mata_pelajaran" class="form-control">
        </div>

        <div class="form-group">
            <label for="tanggal_mulai">Periode</label>
            <div class="flex">
                <input type="date" id="tanggal_mulai" name="tanggal_mulai" required class="form-control">
                <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="form-control ml-4">
            </div>
        </div>

        <div class="form-group">
            <label for="nomor_sk">Nomor SK</label>
            <input type="text" id="nomor_sk" name="nomor_sk" class="form-control">
        </div>

        <div class="form-group">
            <label for="status_penugasan">Status Penugasan</label>
            <select id="status_penugasan" name="status_penugasan" required class="form-control">
                <option value="Tetap">Tetap</option>
                <option value="Honorer">Honorer</option>
                <option value="Kontrak">Kontrak</option>
            </select>
        </div>

        <div class="form-group">
            <label for="sk_penugasan">Upload SK Penugasan (PDF/JPG)</label>
            <input type="file" id="sk_penugasan" name="sk_penugasan" class="form-control">
        </div>

        <button type="submit" class="btn-submit">Simpan Riwayat Penugasan</button>
    </form>
</div>
@endsection
