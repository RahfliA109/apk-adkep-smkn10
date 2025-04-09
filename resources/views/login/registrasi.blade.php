<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Halaman Registrasi</title>
  <link rel="stylesheet" href="{{ asset('css/regis.css') }}">
</head>
<body>
  <div class="container">
    <div class="left">
      <img src="{{ asset('aset/logologin.png') }}" alt="Ilustrasi" />
    </div>
    <div class="right">
      <div class="login-box">
        <h2>FORM REGISTRASI</h2>

        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="input-group">
            <label>Nama Lengkap</label>
            <div class="input-icon">
              <span>👤</span>
              <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" required />
            </div>
          </div>

          <div class="input-group">
            <label>NIP</label>
            <div class="input-icon">
              <span>🔒</span>
              <input type="text" name="nuptk_nip" placeholder="Masukkan NIP" required />
            </div>
          </div>

          <div class="input-group">
            <label>Alamat Gmail</label>
            <div class="input-icon">
              <span>✉️</span>
              <input type="email" name="email" placeholder="Masukkan Email" required />
            </div>
          </div>

          <div class="input-group">
            <label>No Handphone</label>
            <div class="input-icon">
              <span>📱</span>
              <input type="text" name="no_hp" placeholder="Masukkan No HP" required />
            </div>
          </div>

          <div class="input-group">
            <label>Password</label>
            <div class="input-icon">
              <span>🔑</span>
              <input type="password" name="password" placeholder="Masukkan Password" required />
            </div>
          </div>

          <button type="submit" class="login-button">Daftar</button>
        </form>

        <div class="register-link">
          Sudah punya akun? <a href="{{ route('login.login') }}">Kembali ke Login</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
