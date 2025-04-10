@extends('sidebar.sidebar')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('konten')
<div class="container mx-auto py-10">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-center">Profil Pengguna</h2>

        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Tambahkan @method('PUT') jika pakai route method PUT -->
            
            <div class="mb-4 text-center">
                <img 
                    src="{{ asset('storage/foto/' . $user->foto) }}" 
                    alt="Foto Profil" 
                    class="w-32 h-32 rounded-full mx-auto object-cover border"
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ $user->nama }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">NIP</label>
                <input type="text" name="nip" value="{{ $user->nip }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Nomor HP</label>
                <input type="text" name="nohp" value="{{ $user->nohp }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700">Foto Profil (opsional)</label>
                <input type="file" name="foto" class="w-full border px-4 py-2 rounded">
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
