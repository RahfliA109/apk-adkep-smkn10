@extends('layout.sidebar')

<link rel="stylesheet" href="{{ asset('css/konten/profil.css') }}">

@section('konten')

@if(session('success'))
    <div class="notif-success" id="notif-success">
        {{ session('success') }}
    </div>
@endif

<div class="profile-container">
    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" id="profile-form">
        @csrf
        <div class="flex-wrapper">
            <!-- Bagian kanan: Gambar profil -->
            <div class="kanan">
                <div class="gambar">
                <div class="profile-logo" onclick="toggleDropdown()">
                    @if(auth()->user()->gambar)
                        <img src="{{ asset(auth()->user()->gambar) }}" alt="Foto Profil" id="profile-photo">
                    @else
                        <img src="{{ asset('aset/userimage.png') }}" alt="Foto Default" id="profile-photo">
                    @endif
                </div>
                    <!-- Input file harus di dalam form -->
                    <input 
                        type="file" 
                        id="profile-image-input" 
                        name="gambar" 
                        style="display: none;" 
                        accept="image/*"
                        onchange="previewImage(event)">
                </div>
            </div>

            <!-- Bagian kiri: Form data -->
            <div class="kiri">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ auth()->user()->nama }}" required maxlength="50">
                </div>
                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" name="nip" value="{{ auth()->user()->nip }}" required maxlength="18">
                </div>
                <div class="form-group">
                    <label>Gmail</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" required maxlength="50">
                </div>
                <div class="form-group">
                    <label>No Handphone</label>
                    <input type="text" name="no_handphone" value="{{ auth()->user()->no_handphone }}" required maxlength="15">
                </div>
            </div>
        </div>

        <!-- Tombol di bawah -->
        <div class="form-button">
            <a href="{{route('konten.dashboard')}}">
                <button type="button" class="btn-back">Kembali</button>
            </a>
            <button type="submit" class="btn-update">Update Profile</button>
        
    </form>

    <!-- Form hapus akun -->
            <form action="{{ route('profil.delete') }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus akun ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">Hapus Akun</button>
            </form>
        </div>
    </div>

<script src="{{ asset('js/gantigambar.js') }}"></script>
<script src="{{ asset('js/profil.js') }}"></script>

@endsection
