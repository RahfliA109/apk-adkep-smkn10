@extends('layout.sidebar')
<link rel="stylesheet" href="{{ asset('css/konten/form-input.css') }}">
<title>Edit Riwayat Menikah</title>

@section('konten')
<div class="container mx-auto py-8">
    <h2>Edit Riwayat Menikah</h2>

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

    <form action="{{ route('riwayatMenikah.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Status Perkawinan -->
        <div class="form-group">
            <label>Status Perkawinan <span class="text-red-500">*</span></label>
            <select name="status_perkawinan" required>
                <option value="">-- Pilih Status --</option>
                <option value="Kawin" {{ $data->status_perkawinan == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                <option value="Belum Kawin" {{ $data->status_perkawinan == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                <option value="Duda" {{ $data->status_perkawinan == 'Duda' ? 'selected' : '' }}>Duda</option>
                <option value="Janda" {{ $data->status_perkawinan == 'Janda' ? 'selected' : '' }}>Janda</option>
            </select>
        </div>

        <!-- Tanggal Menikah/Cerai -->
        <div class="form-group">
            <label>Tanggal Menikah/Cerai</label>
            <input type="date" name="tanggal_menikah_cerai" value="{{ $data->tanggal_menikah_cerai }}">
        </div>

        <!-- Data Pasangan -->
        <div class="form-group">
            <label>Nama Pasangan</label>
            <input type="text" name="nama_pasangan" value="{{ $data->nama_pasangan }}">
        </div>

        <div class="form-group">
            <label>Pekerjaan Pasangan</label>
            <input type="text" name="pekerjaan_pasangan" value="{{ $data->pekerjaan_pasangan }}">
        </div>

        <div class="form-group">
            <label>Jumlah Anak</label>
            <input type="number" name="jumlah_anak" min="0" value="{{ $data->jumlah_anak }}">
        </div>

        <!-- Dokumen -->
        <div class="form-group">
            <label>Akta Nikah/Cerai (PDF/JPG/JPEG, maks 2MB)</label>
            <input type="file" name="akta_nikah" accept=".pdf,.jpg,.jpeg">
            @if($data->akta_nikah)
                <p>File sebelumnya: <a href="{{ asset('storage/'.$data->akta_nikah) }}" target="_blank">Lihat File</a></p>
            @endif
        </div>

        <button type="submit" class="btn-submit">Update Data</button>
        <a href="{{ route('riwayatMenikah.index') }}" class="btn-cancel">Kembali</a>
    </form>
</div>
@endsection
