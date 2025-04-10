<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ganti Password</title>
    <link rel="stylesheet" href="css/lupapw.css">
</head>
<body>
    <div class="card">
        <img src="{{ asset('aset/logoasli.png') }}" alt="Logo ADKEP" class="logo">
        
        <div class="card-content">
            <h2>Ganti Password</h2>
            
            <form action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Masukan Email</label>
                    <input type="email" name="email" id="email" placeholder="example@gmail.com" required
                    >
                </div>
                <button type="button" onclick="window.location.href='{{ route('login') }}'" class="btn-back">
                  Kembali
                </button>



                </a>
                    <button type="submit" class="btn-submit">
                      Lanjutkan
                    </button>
                  </div>
            </form>
        </div>
    </div>
</body>
</html>