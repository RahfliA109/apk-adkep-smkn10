@extends('layout.sidebar')

<style>
.judul{
    margin-bottom:20px;
}

.account-card {
    border: 1px solid #e0e0e0;
    padding: 1rem;
    margin-bottom: 1rem;
    border-radius: 10px;
    background-color: #fff;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.account-card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.profile-photo img {
    width: 4rem;
    height: 4rem;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #ccc;
}

.account-info {
    flex: 1;
}

button {
    margin-top: 0.5rem;
}

/* Tombol Hapus (Merah) */
.bg-delete {
    background-color: #dc3545;
    color: white;
    padding: 8px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.bg-delete:hover {
    background-color: #d32f2f;
}

/* Tombol Lihat (Hijau) */
.btn-view {
    background-color: #4CAF50;
    color: white;
    padding: 8px 20px;
    border: none;
    border-radius: 4px;
    text-decoration:none;
    cursor: pointer;
}

.btn-view:hover {
    background-color: #388E3C;
}

/* Flexbox untuk tombol supaya berjejer horizontal */
.button-group {
    display: flex;
    gap: 1rem;
}

/* Style for search results notification */
.search-notification {
    background-color: #f8f9fa;
    padding: 10px 15px;
    border-radius: 5px;
    margin-bottom: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.clear-search {
    background-color: #6c757d;
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 0.9rem;
}

.clear-search:hover {
    background-color: #5a6268;
}
</style>

@section('konten')

    @php
        $showSearchBar = true; // Menetapkan $showSearchBar ke true untuk menampilkan search bar
    @endphp


<div class="container mx-auto py-8">
    <div class="judul">
        <h1 class="text-xl font-bold mb-6">Kelola Akun</h1>
    </div>
    
    @if(isset($keyword) && !empty($keyword))
    <div class="search-notification">
        <p>Hasil pencarian untuk: <strong>"{{ $keyword }}"</strong></p>
        <a href="{{ route('seeuser') }}" class="clear-search">Tampilkan Semua</a>
    </div>
    @endif
    
    <div class="grid grid-cols-2 gap-6">

        <!-- Akun Admin -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold mb-4">Akun Admin ({{ isset($adminAccounts) ? $adminAccounts->count() : 0 }})</h2>
            @if(isset($adminAccounts) && $adminAccounts->count() > 0)
                @foreach($adminAccounts as $admin)
                    <div class="account-card">
                        <div class="profile-photo">
                            @if($admin->gambar)
                                <img src="{{ asset($admin->gambar) }}" alt="Foto Profil">
                            @else
                                <img src="{{ asset('aset/userimage.png') }}" alt="Foto Default">
                            @endif
                        </div>
                        <div class="account-info">
                            <p class="font-semibold">{{ $admin->nama }}</p>
                            <p class="text-sm text-gray-600">NIP: {{ $admin->nip }}</p>
                            <form action="{{ route('akun.hapus', $admin->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="button-group">
                                    <button class="bg-delete" type="submit">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Tidak ada akun admin{{ isset($keyword) ? ' yang cocok dengan pencarian' : '' }}.</p>
            @endif
        </div>

        <!-- Akun User -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold mb-4">Akun User ({{ isset($userAccounts) ? $userAccounts->count() : 0 }})</h2>
            @if(isset($userAccounts) && $userAccounts->count() > 0)
                @foreach($userAccounts as $user)
                    <div class="account-card">
                        <div class="profile-photo">
                            @if($user->gambar)
                                <img src="{{ asset($user->gambar) }}" alt="Foto Profil">
                            @else
                                <img src="{{ asset('aset/userimage.png') }}" alt="Foto Default">
                            @endif
                        </div>
                        <div class="account-info">
                            <p class="font-semibold">{{ $user->nama }}</p>
                            <p class="text-sm text-gray-600">NIP: {{ $user->nip }}</p>
                            <div class="button-group">
                                <form action="{{ route('akun.hapus', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-delete" type="submit">Hapus</button>
                                </form>
                                <a href="{{ route('akun.lihat', $user->id) }}" class="btn-view">Lihat</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Tidak ada akun user{{ isset($keyword) ? ' yang cocok dengan pencarian' : '' }}.</p>
            @endif
        </div>
    </div>
</div>
@endsection