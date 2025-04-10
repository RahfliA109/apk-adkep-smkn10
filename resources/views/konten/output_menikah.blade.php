@extends('sidebar.sidebar')
<link rel="stylesheet" href="{{ asset('css/form-input.css') }}">
<title>Riwayat Menikah</title>

@section('konten')
<div class="container mx-auto py-8">
    <h2>Data Riwayat Menikah</h2>
    
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="form-view">
        <!-- Status Perkawinan -->
        <div class="form-group">
            <label>Status Perkawinan</label>
            <div class="form-value">{{ $data->status_perkawinan }}</div>
        </div>
        
        <!-- Tanggal Menikah/Cerai -->
        <div class="form-group">
            <label>Tanggal Menikah/Cerai</label>
            <div class="form-value">
                {{ $data->tanggal_menikah_cerai ? \Carbon\Carbon::parse($data->tanggal_menikah_cerai)->format('d/m/Y') : '-' }}
            </div>
        </div>
        
        <!-- Data Pasangan -->
        <div class="form-group">
            <label>Nama Pasangan</label>
            <div class="form-value">{{ $data->nama_pasangan ?: '-' }}</div>
        </div>
        
        <div class="form-group">
            <label>Pekerjaan Pasangan</label>
            <div class="form-value">{{ $data->pekerjaan_pasangan ?: '-' }}</div>
        </div>
        
        <div class="form-group">
            <label>Jumlah Anak</label>
            <div class="form-value">{{ $data->jumlah_anak }}</div>
        </div>
        
        <!-- Dokumen -->
        <div class="form-group">
            <label>Akta Nikah/Cerai</label>
            <div class="form-value">
                @if($data->akta_nikah)
                    <a href="{{ asset('storage/'.$data->akta_nikah) }}" target="_blank" class="text-blue-500 hover:underline">Lihat Dokumen</a>
                @else
                    -
                @endif
            </div>
        </div>
    </div>
    
    <div class="flex gap-4 mt-6">
        <a href="{{ route('menikah.edit', $data->id) }}" class="btn-edit">Edit Data</a>
        <form action="{{ route('menikah.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">Hapus Data</button>
        </form>
        <a href="{{ route('dashboard') }}" class="btn-cancel">Kembali</a>
    </div>
</div>
@endsection