@extends('layout.sidebar')
<link rel="stylesheet" href="{{ asset('css/konten/form-input.css') }}">
<title>Riwayat Menikah</title>

@section('konten')
<div class="container mx-auto py-8">
    <h2>Form Riwayat Menikah</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form input --}}
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Status Perkawinan -->
        <div class="form-group">
            <label>Status Perkawinan <span class="text-red-500">*</span></label>
            <select name="status_perkawinan" required>
                <option value="">-- Pilih Status --</option>
                <option value="Kawin">Kawin</option>
                <option value="Belum Kawin">Belum Kawin</option>
                <option value="Duda">Duda</option>
                <option value="Janda">Janda</option>
            </select>
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

        <button type="submit" class="btn-submit">Simpan Data</button>
        <a href="" class="btn-cancel">Kembali</a>
    </form>
</div>
@endsection
