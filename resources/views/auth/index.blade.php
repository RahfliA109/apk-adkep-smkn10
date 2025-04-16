<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>
  <link rel="stylesheet" href="{{ asset('css/konten/login.css') }}">
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
          <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif


        {{-- FORM LOGIN --}}
        <form method="POST" action="{{ route('login.submit') }}">
          @csrf
          <div class="input-group">
            <label>Nomor NIP</label>
            <div class="input-icon">
              <span>👤</span>
              <input type="text" name="nip" placeholder="Masukkan NIP" required  pattern="^\d{18}$" title="NIP harus terdiri dari 18 angka" 
              maxlength="18"  value="{{ old('nip') }}"/>

            </div>
          </div>
          <div class="input-group">
            <label>Password</label>
            <div class="input-icon">
              <span>🔒</span>
              <input type="password" name="password" placeholder="Masukkan Password" required   maxlength="50" 
               title="Password tidak boleh lebih dari 50 karakter"  value="{{ old('password') }}"  >

            </div>
          </div>
          <div class="forgot-password">
            <a href="{{route('lupapw')}}">Lupa Password?</a>
          </div>
          <button class="login-button" type="submit">Masuk</button>
        </form>

        <div class="register-link">
          Belum punya akun? <a href="{{ route('auth.registrasi') }}">Daftar</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
