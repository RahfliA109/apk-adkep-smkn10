@extends('layout.sidebar')
<title>Buat Akun Admin</title>

@section('konten')

<style>
    /* Tambahkan jarak ke atas agar tidak ketabrak navbar */
    .main-content {
        padding-top: 0;
    }

    .kotak {
        padding: 30px;
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.15);
        max-width: 900px;
        margin: 30px auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 6px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="file"] {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
    }

    button[type="submit"] {
        padding: 12px 24px;
        background-color: #0066cc;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        margin-top: 10px;
    }
    

    button[type="submit"]:hover {
        background-color: #005bb5;
    }
</style>

<div class="kotak">
    <h2>Buat Akun Admin</h2>
    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip" required maxlength="18">
        </div>

        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" required maxlength="50">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="no_handphone">Nomor HP</label>
            <input type="text" name="no_handphone" id="no_handphone" maxlength="15">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required maxlength="16">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required maxlength="16">
        </div>

        <input type="hidden" name="role" value="admin">

        <button type="submit">Buat Akun Admin</button>
    </form>
</div>
@endsection
