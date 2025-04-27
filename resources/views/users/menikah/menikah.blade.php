@extends('layout.sidebar')
<link rel="stylesheet" href="{{ asset('css/konten/form-input.css') }}">
<title>Riwayat Menikah</title>

@section('konten')
<div class="container mx-auto py-8">
    <h2>Form Riwayat Menikah</h2>

    {{-- Form input --}}
    <form action="{{ route('riwayatMenikah.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <!-- Status Perkawinan -->
        <div class="form-group">
            <label>Status Perkawinan</label>
            <input type="text" name="status_perkawinan">
        </div>

        <!-- Tanggal Menikah/Cerai -->
        <div class="form-group">
            <label>Tanggal Menikah/Cerai</label>
            <input type="date" name="tanggal_menikah_cerai">
        </div>

        <!-- Data Pasangan -->
        <div class="form-group">
            <label>Nama Pasangan</label>
            <input type="text" name="nama_pasangan">
        </div>

        <div class="form-group">
            <label>Pekerjaan Pasangan</label>
            <input type="text" name="pekerjaan_pasangan">
        </div>

        <div class="form-group">
            <label>Jumlah Anak</label>
            <input type="number" name="jumlah_anak" min="0" value="0">
        </div>

        <!-- Dokumen -->
        <div class="form-group">
            <label>Akta Nikah/Cerai (PDF/JPG/JPEG, maks 2MB)</label>
            <input type="file" name="akta_nikah" accept=".pdf,.jpg,.jpeg">
        </div>

        <button type="submit" class="btn-submit">Simpan Data Menikah</button>
    </form>
</div>
@endsection
