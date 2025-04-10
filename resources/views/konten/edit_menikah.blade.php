@extends('sidebar.sidebar')
<link rel="stylesheet" href="{{ asset('css/form-input.css') }}">
<title>Riwayat Menikah</title>

@section('konten')
<div class="container mx-auto py-8">
    <h2>Form Riwayat Menikah</h2>
    
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('menikah.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Status Perkawinan -->
        <div class="form-group">
            <label>Status Perkawinan <span class="text-red-500">*</span></label>
            <select name="status_perkawinan" required>
                <option value="">-- Pilih Status --</option>
                <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                <option value="Duda" {{ old('status_perkawinan') == 'Duda' ? 'selected' : '' }}>Duda</option>
                <option value="Janda" {{ old('status_perkawinan') == 'Janda' ? 'selected' : '' }}>Janda</option>
            </select>
            @error('status_perkawinan')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- Tanggal Menikah/Cerai -->
        <div class="form-group">
            <label>Tanggal Menikah/Cerai</label>
            <input type="date" name="tanggal_menikah_cerai" value="{{ old('tanggal_menikah_cerai') }}">
            @error('tanggal_menikah_cerai')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- Data Pasangan -->
        <div class="form-group">
            <label>Nama Pasangan</label>
            <input type="text" name="nama_pasangan" value="{{ old('nama_pasangan') }}">
            @error('nama_pasangan')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label>Pekerjaan Pasangan</label>
            <input type="text" name="pekerjaan_pasangan" value="{{ old('pekerjaan_pasangan') }}">
        </div>
        
        <div class="form-group">
            <label>Jumlah Anak</label>
            <input type="number" name="jumlah_anak" min="0" value="{{ old('jumlah_anak', 0) }}">
        </div>
        
        <!-- Dokumen -->
        <div class="form-group">
            <label>Akta Nikah/Cerai (PDF/JPG/JPEG, maks 2MB)</label>
            <input type="file" name="akta_nikah" accept=".pdf,.jpg,.jpeg">
            @error('akta_nikah')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <button type="submit" class="btn-submit">Update</button>
        <a href="{{ route('dashboard') }}" class="btn-cancel">Kembali</a>
    </form>
</div>
@endsection