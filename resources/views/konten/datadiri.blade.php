@extends('sidebar.sidebar')
<link rel="stylesheet" href="css/app.css">
<title>biodata</title>

@section('konten')
    <div class="container mx-auto py-8">
        <h2 class="text-3xl font-semibold mb-6">Form Input Data Pegawai</h2>
        
        <!-- Form Input -->
        <form action="/submit" method="POST">
            @csrf <!-- Untuk perlindungan terhadap CSRF -->
            
            <div class="mb-4">
                <label for="nama" class="block text-sm font-semibold text-gray-700">Nama</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan nama" required>
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-sm font-semibold text-gray-700">NIP</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan nama" required>
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-700">NUPTK</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan email" required>
            </div>
            
            <div class="mb-4">
                <label for="jabatan" class="block text-sm font-semibold text-gray-700">Status Kepegawaian</label>
                <input type="text" id="jabatan" name="jabatan" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan jabatan" required>
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-sm font-semibold text-gray-700">Sumber Gaji</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan nama" required>
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-sm font-semibold text-gray-700">Wilayah Pembayaran </label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan nama" required>
            </div>
            
            <div class="mb-4">
                <label for="nama" class="block text-sm font-semibold text-gray-700">No KTP</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan nama" required>
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-sm font-semibold text-gray-700">Tempat Tanggal Lahir </label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan nama" required>
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-sm font-semibold text-gray-700">Alamat Rumah </label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan nama" required>
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-sm font-semibold text-gray-700">Email Pribadi</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan nama" required>
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-sm font-semibold text-gray-700">No Handphone</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan nama" required>
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">Kirim</button>
            </div>
        </form>
    </div>
@endsection
