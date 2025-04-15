<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar dengan Animasi</title>
    <link rel="stylesheet" href="{{ asset('css/layout/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout/responsive.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <button class="toggle-btn" id="toggleBtn">☰</button>
        <div class="navbar-title"></div>
        <div class="dropdown-container">
            <div class="profile-logo" onclick="toggleDropdown()">P</div>
            <div id="dropdownMenu" class="dropdown-menu">
                <a href="{{route('konten.profil')}}">Profil</a>
                <a href="/ganti-password">Ganti Password</a>
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="{{ asset('aset/logoasli.png') }}" alt="Logo">
            </div>
        </div>
        <div class="sidebar-menu">
            <div class="menu-item">
                <a href="{{ url('dashboard') }}" class="menu-link">Dashboard</a>
            </div>
            <div class="menu-item">
                <a href="{{ url('datadiri') }}" class="menu-link">Data Diri</a>
            </div>
            <div class="menu-item">
                <a href="{{ url('menikah') }}" class="menu-link">Riwayat Pernikahan</a>
            </div>
            <div class="menu-item">
                <a href="{{ url('pendidikan') }}" class="menu-link">Riwayat Pendidikan</a>
            </div>
            <div class="menu-item">
                <a href="{{ url('penugasan') }}" class="menu-link">Riwayat Penugasan</a>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content w-full">
        @yield('konten')
    </main>

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>