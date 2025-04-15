<!-- Profil Blade Template (profil.blade.php) -->
@extends('layout.sidebar')

<link rel="stylesheet" href="{{ asset('css/konten/profil.css') }}">

@section('konten')

<div class="profile-container">
    <div class="flex-wrapper">
        <!-- Bagian kanan untuk gambar profil -->
        <div class="kanan">
            <div class="gambar">
                <!-- Mengecek apakah pengguna sudah memiliki gambar profil -->
                @if(auth()->user()->gambar)
                    <img 
                        src="{{ Storage::url(auth()->user()->gambar) }}" 
                        alt="Profile Photo" 
                        id="profile-photo">
                @else
                    <img 
                        src="{{ asset('aset/userimage.png') }}" 
                        alt="Profile Photo" 
                        id="profile-photo">
                @endif
                
                <!-- Input file untuk upload gambar -->
                <input 
                    type="file" 
                    id="profile-image-input" 
                    name="gambar" 
                    style="display: none;" 
                    accept="image/*"
                    onchange="previewImage(event)">
            </div>
        </div>

        <!-- Bagian kiri untuk form input -->
        <div class="kiri">
            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ auth()->user()->nama }}" required>
                </div>
                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" name="nip" value="{{ auth()->user()->nip }}" required>
                </div>

                <div class="form-group">
                    <label>Gmail</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" required>
                </div>

                <div class="form-group">
                    <label>No Handphone</label>
                    <input type="text" name="no_handphone" value="{{ auth()->user()->no_handphone }}" required>
                </div>
                
                <div class="form-button">
                    <a href="{{ url()->previous() }}">
                        <button type="button" class="btn-back">Kembali</button>
                    </a>

                    <button type="submit" class="btn-update">Update Profile</button>
                </div>

            </form>

            <!-- Form hapus akun -->
            <form action="{{ route('profil.delete') }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus akun ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">Hapus Akun</button>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/gantigambar.js') }}"></script>

@endsection
