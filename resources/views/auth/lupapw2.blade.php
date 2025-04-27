<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ganti Password</title>
    <link rel="stylesheet" href="{{ asset('css/konten/lupapw.css') }}">
</head>
<body>
    <div class="card">
        <img src="{{ asset('aset/logoasli.png') }}" alt="Logo ADKEP" class="logo">
        <div class="card-content">
            <h2>Ganti Password</h2>

            {{-- Jika BELUM ada email --}}
            @if (!isset($email))
                <form action="{{ route('password.check') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Masukkan Email</label>
                        <input type="email" name="email" id="email" required placeholder="example@gmail.com">
                    </div>

                    <button type="submit" class="btn-submit">Lanjutkan</button>
                </form>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

            {{-- Jika SUDAH ada email --}}
            @else
                <form action="{{ route('password.save') }}" method="POST">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">

                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn-submit">Simpan Password</button>
                </form>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @endif

            {{-- Tombol Kembali --}}
            <a href="{{ url()->previous() }}" class="btn-back">Kembali</a>
        </div>
    </div>
</body>
</html>
