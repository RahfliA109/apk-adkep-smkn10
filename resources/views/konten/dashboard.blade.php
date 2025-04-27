@extends('layout.sidebar')
<link rel="stylesheet" href="css/konten/dashboard.css">

@section('konten')
<div class="dashboard-page"> {{-- Tambahkan wrapper ini agar CSS scoped bekerja --}}
    <div class="dashboard-container">
        <header>
            @if(Auth::check())
                <h1>Selamat Datang, <b>{{ Auth::user()->nama }}</b>!</h1>
            @else
                <h1>Selamat Datang di Aplikasi Kami!</h1>
            @endif
            <p>Ikuti prosedur berikut untuk memulai.</p>
        </header>

        <div class="steps-container">
            <div class="step">
                <div class="step-number">1</div>
                <h2>Melengkapi Profil Anda</h2>
                <p>Harap lengkapi data pada profil Anda agar kami bisa mempermudah pengisian data di kemudian hari.</p>
                <p><strong>Cara Melengkapi Profil:</strong></p>
                <ul>
                    <li>Klik pada <strong>Ikon Profil</strong> di sudut kanan atas</li>
                    <li>Masukkan informasi yang diperlukan (Nama, Email, Foto, dll.)</li>
                    <li>Simpan perubahan Anda</li>
                </ul>
            </div>

            <div class="step">
                <div class="step-number">2</div>
                <h2>Menyiapkan Data yang Dibutuhkan</h2>
                <p>Siapkan data yang akan digunakan dalam aplikasi untuk memastikan proses input berjalan lancar.</p>
                <p><strong>Cara Menyiapkan Data:</strong></p>
                <ul>
                    <li>Kunjungi menu <strong>Data Pengguna</strong></li>
                    <li>Pastikan file Anda dalam format yang didukung (PDF, JPG, DOCX, dll.)</li>
                    <li>Unggah file yang diperlukan</li>
                </ul>
            </div>          

            <div class="step">
                <div class="step-number">3</div>
                <h2>Hubungi Dukungan</h2>
                <p>Jika Anda menemui kendala atau membutuhkan bantuan lebih lanjut, tim dukungan kami siap membantu.</p>
                <p><strong>Cara Menghubungi Dukungan:</strong></p>
                <ul>
                    <li>Klik <strong>Bantuan</strong> di menu utama</li>
                    <li>Pilih <strong>Hubungi Kami</strong> dan pilih jenis dukungan yang Anda butuhkan (chat, email, atau telepon)</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
