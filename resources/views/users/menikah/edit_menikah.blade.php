@extends('layout.sidebar')

<link rel="stylesheet" href="{{ asset('css/konten/form-input.css') }}">
<title>Edit Riwayat Menikah</title>

@section('konten')
<body class="edit-page">
<div class="kotak">
<div class="container mx-auto py-8">
    <div class="judul">
    <h2>Edit Riwayat Menikah</h2>
    </div>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Notifikasi error --}}
    @if(session('error'))
        <div class="alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('riwayatMenikah.update', $riwayatMenikah->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Status Perkawinan -->
        <div class="form-group">
        <label>Tanggal Menikah/Cerai</label>
        <input type="text" name="status_perkawinan" value="{{ $riwayatMenikah->status_perkawinan }}">
        </div>

        <!-- Tanggal Menikah/Cerai -->
        <div class="form-group">
            <label>Tanggal Menikah/Cerai</label>
            <input type="date" name="tanggal_menikah_cerai" value="{{ $riwayatMenikah->tanggal_menikah_cerai }}">
        </div>

        <!-- Data Pasangan -->
        <div class="form-group">
            <label>Nama Pasangan</label>
            <input type="text" name="nama_pasangan" value="{{ $riwayatMenikah->nama_pasangan }}">
        </div>

        <div class="form-group">
            <label>Pekerjaan Pasangan</label>
            <input type="text" name="pekerjaan_pasangan" value="{{ $riwayatMenikah->pekerjaan_pasangan }}">
        </div>

        <div class="form-group">
            <label>Jumlah Anak</label>
            <input type="number" name="jumlah_anak" min="0" value="{{ $riwayatMenikah->jumlah_anak }}">
        </div>

        <!-- Dokumen -->
        <div class="form-group">
            <label>Akta Nikah/Cerai (PDF/JPG/JPEG, maks 2MB)</label>
            <input type="file" name="akta_nikah" accept=".pdf,.jpg,.jpeg">
            @if($riwayatMenikah->akta_nikah)
                <p>File sebelumnya: <a href="{{ asset('storage/'.$riwayatMenikah->akta_nikah) }}" target="_blank">Lihat File</a></p>
            @endif
        </div>

        <div class="form-actions">
            <button type="submit">Simpan Perubahan</button>
            <a href="{{ url()->previous() }}" class="tombol">Batal</a>
        </div>
    </form>
</div>
</div>
</body>
@endsection
