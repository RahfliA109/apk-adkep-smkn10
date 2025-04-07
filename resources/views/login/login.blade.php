<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page Native</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="container">
    <div class="left">
      <img src="aset/logologin.png" alt="Ilustrasi" />
    </div>
    <div class="right">
      <div class="login-box">
        <h2>SELAMAT DATANG</h2>
        <div class="input-group">
          <label>Nomor NIP</label>
          <div class="input-icon">
            <span>👤</span>
            <input type="text" placeholder="Masukkan NIP" />
          </div>
        </div>
        <div class="input-group">
          <label>Password</label>
          <div class="input-icon">
            <span>🔒</span>
            <input type="password" placeholder="Masukkan Password" />
          </div>
        </div>
        <div class="forgot-password">
          <a href="#">Lupa Password?</a>
        </div>
        <button class="login-button">Masuk</button>
        <div class="register-link">
          Dont Have Account? <a href="{{route('login.registrasi')}}">Daftar</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    function toggleSwitch() {
      alert("Fitur toggle belum aktif!");
    }
  </script>
</body>
</html>
