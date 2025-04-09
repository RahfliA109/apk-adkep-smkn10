<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar dengan Animasi</title>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <button class="toggle-btn" id="toggleBtn">☰</button>
        <div class="navbar-title"></div>
        <div class="profile-logo">P</div>
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

    <script src="{{ asset('js/sidebar.js') }}"></script>

    <!-- Main Content -->
    <main class="main-content w-full">
        @yield('konten')
    </main>
</body>
</html>
