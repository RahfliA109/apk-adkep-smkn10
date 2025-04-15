<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Halaman Registrasi</title>
  <link rel="stylesheet" href="{{ asset('css/konten/regis.css') }}">
</head>
<body>
  <div class="container">
    <div class="left">
      <img src="{{ asset('aset/logologin.png') }}" alt="Ilustrasi" />
    </div>
    <div class="right">
      <div class="login-box">
        <h2>FORM REGISTRASI</h2>

        {{-- NOTIFIKASI ERROR --}}
        @if ($errors->any())
          <div class="alert alert-danger" style="color:red; margin-bottom:10px;">
            <ul style="margin: 0; padding-left: 20px;">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        {{-- NOTIFIKASI SUKSES --}}
        @if (session('success'))
          <div class="alert alert-success" style="color:green; margin-bottom:10px;">
            {{ session('success') }}
          </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST">
          @csrf

          <div class="input-group">
            <label>Nama Lengkap</label>
            <div class="input-icon">
              <span>👤</span>
              <input type="text" name="nama" placeholder="Masukkan Nama Lengkap"
                     required maxlength="50" value="{{ old('nama') }}" />
            </div>
          </div>

          <div class="input-group">
            <label>NIP</label>
            <div class="input-icon">
              <span>🔒</span>
              <input type="text" name="nip" placeholder="Masukkan NIP"
                     required pattern="^\d{18}$" title="NIP harus terdiri dari 18 angka"
                     maxlength="18" value="{{ old('nip') }}" />
            </div>
          </div>

          <div class="input-group">
            <label>Alamat Email</label>
            <div class="input-icon">
              <span>✉️</span>
              <input type="email" name="email" placeholder="Masukkan Email"
                     required maxlength="50" value="{{ old('email') }}" />
            </div>
          </div>

          <div class="input-group">
            <label>No Handphone</label>
            <div class="input-icon">
              <span>📱</span>
              <input type="text" name="no_handphone" placeholder="Masukkan No HP"
                     required maxlength="15" value="{{ old('no_handphone') }}" />
            </div>
          </div>

          <div class="input-group">
            <label>Password</label>
            <div class="input-icon">
              <span>🔑</span>
              <input type="password" name="password" placeholder="Masukkan Password"
                     required maxlength="50" />
            </div>
          </div>

          <div class="input-group">
            <label>Konfirmasi Password</label>
            <div class="input-icon">
              <span>🔑</span>
              <input type="password" name="password_confirmation" placeholder="Ulangi Password"
                     required maxlength="50" />
            </div>
          </div>

          <button type="submit" class="login-button">Daftar</button>
        </form>

        <div class="register-link">
          Sudah punya akun? <a href="{{ url()->previous() ?? url('/') }}">Kembali ke Login</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
