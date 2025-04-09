<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar dengan Animasi</title>
    <link rel="stylesheet" href="{{asset('css.sidebar')}}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <button class="toggle-btn" id="toggleBtn">☰</button>
        <div class="navbar-title"></div>
        <div class="dropdown-container">
        <div class="profile-logo" onclick="toggleDropdown()">P</div>

        <div id="dropdownMenu" class="dropdown-menu">
            <a href="/profil">Profil</a>
            <a href="/ganti-password">Ganti Password</a>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit">Log Out</button>
            </form>
        </divB>
        </div>

    </nav>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo"><img src="aset/logoasli.png" ></div>
        </div>
        <div class="sidebar-menu">
            <div class="menu-item">
                <a href="dashboard" class="menu-link">Dashboard</a>
            </div>
            <div class="menu-item">
                <a href="datadiri" class="menu-link">data diri</a>
            </div>
            <div class="menu-item">
                <a href="menikah" class="menu-link">riwayat pernikahan</a>
            </div>
            <div class="menu-item">
                <a href="pendidikan" class="menu-link">Riwayat Pendidikan</a>
            </div>
            <div class="menu-item">
                <a href="penugasan" class="menu-link">Riwayat Penugasan</a>
            </div>
        </div>
    </aside>
    <script src="{{asset('js.sidebar')}}"></script>

    <!-- Main Content -->
    <main class="main-content w-full">
        @yield('konten')
    </main>
</body>
</html>