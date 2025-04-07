@extends('sidebar.sidebar')

<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<style>
    .foto-pegawai {
    border: 2px solid #000; /* Ubah nilai sesuai kebutuhan */
}
</style>

{{-- Section untuk konten utama --}}
@section('konten')
    <div class="container mx-auto py-8">
        {{-- Bagian Pengenalan Aplikasi dengan Gambar Latar --}}
        <div class="relative text-center mb-8">php artisan make:migration create_users_table --create=users

            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('asets/images.jpeg') }}');">
                <div class="absolute inset-0 bg-black opacity-40"></div> {{-- Overlay untuk memperjelas teks --}}
            </div>
            <div class="relative z-10">
                <h2 class="text-5xl font-semibold text-white">Selamat Datang di Aplikasi Pembantu Administrasi Kepegawaian</h2>
                <p class="text-lg text-white mt-4">Aplikasi ini dirancang untuk pengelolaan data kepegawaian, absensi, gaji, dan lainnya.</p>
            </div>
        </div>
            {{-- Fitur 1: Biodata Pegawai --}}
            <div class="p-6 rounded-lg shadow-lg custom-border">
                <h3 class="text-xl font-semibold text-gray-700 text-center">Biodata Pegawai</h3>

                
                        <div class="profile-container">
        <h1>Profil Dashboard</h1>
        <table class="profile-table">
            <thead>
                <tr>
                    <th colspan="2">Informasi Profil</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Num</strong></td>
                    <td>: 20192205084</td>
                </tr>
                <tr>
                    <td><strong>Kelas</strong></td>
                    <td>: T1.603</td>
                </tr>
                <tr>
                    <td><strong>Jurusan</strong></td>
                    <td>: Folbank Information</td>
                </tr>
                <tr>
                    <td><strong>Tempat/Tgl Lahir</strong></td>
                    <td>: Pulau Masalima, 10 Agustus 1995</td>
                </tr>
                <tr>
                    <td><strong>Agama</strong></td>
                    <td>: Islam</td>
                </tr>
                <tr>
                    <td><strong>Alamat</strong></td>
                    <td>: Pulau Masalima</td>
                </tr>
                <tr>
                    <td><strong>Telepon</strong></td>
                    <td>: 20192205084</td>
                </tr>
            </tbody>
        </table>
    </div>
                
                    <!-- </div> -->
                </div>
            </div>
        

        {{-- Bagian Kontak atau Dukungan --}}
        <div class="mt-8 text-center">
            <p class="text-lg text-gray-600">Butuh bantuan atau informasi lebih lanjut? Hubungi kami melalui kontak yang tersedia.</p>
            <a href="mailto:support@example.com" class="text-blue-500 underline mt-4 inline-block">Hubungi Kami</a>
        </div>
    </div>

    {{-- JavaScript untuk Toggle Dropdown --}}
    <script>
        // Ambil elemen yang dibutuhkan
        const toggleButton = document.getElementById('toggleBiodata');
        const biodataDiv = document.getElementById('biodata');

        // Fungsi untuk toggle tampilan biodata
        toggleButton.addEventListener('click', () => {
            biodataDiv.classList.toggle('hidden');  // Toggle visibility
        });
    </script>
@endsection