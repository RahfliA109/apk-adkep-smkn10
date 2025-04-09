<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <div class="container">
    <div class="left">
      <img src="{{ asset('aset/logologin.png') }}" alt="Ilustrasi" />
    </div>
    <div class="right">
      <div class="login-box">
        <h2>SELAMAT DATANG</h2>

        @if(session('error'))
          <div style="color: red; margin-bottom: 10px;">
            {{ session('error') }}
          </div>
        @endif

        {{-- FORM LOGIN --}}
        <form method="POST" action="{{ route('login.proses') }}">
          @csrf
          <div class="input-group">
            <label>Nomor NIP</label>
            <div class="input-icon">
              <span>👤</span>
              <input type="text" name="nuptk_nip" placeholder="Masukkan NIP" required />
            </div>
          </div>
          <div class="input-group">
            <label>Password</label>
            <div class="input-icon">
              <span>🔒</span>
              <input type="password" name="password" placeholder="Masukkan Password" required />
            </div>
          </div>
          <div class="forgot-password">
            <a href="#">Lupa Password?</a>
          </div>
          <button class="login-button" type="submit">Masuk</button>
        </form>

        <div class="register-link">
          Belum punya akun? <a href="{{ route('login.registrasi') }}">Daftar</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
