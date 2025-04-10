<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar dengan Animasi</title>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>
<body>
    <style>
        /* navbar.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 10px 20px;
    color: white;
}

.navbar-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.navbar-logo img {
    width: 50px; /* Atur ukuran logo */
}

.user-dropdown {
    position: relative;
}

.user-image {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}

.dropdown {
    display: inline-block;
}

.dropdown-toggle {
    background-color: #333;
    border: none;
    color: white;
    padding: 10px;
    cursor: pointer;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 40px;
    right: 0;
    background-color: #444;
    list-style-type: none;
    padding: 0;
    margin: 0;
    min-width: 160px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown-menu li {
    padding: 10px;
    text-align: right;
}

.dropdown-menu li a {
    color: white;
    text-decoration: none;
}

.dropdown-menu li a:hover {
    background-color: #555;
}

/* Sidebar Styling */
.sidebar {
    width: 200px;
    background-color: #2c3e50;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    padding-top: 20px;
}

.sidebar-logo img {
    width: 100px; /* Adjust logo size in sidebar */
    margin: 0 auto;
    display: block;
}

.sidebar-menu {
    margin-top: 30px;
}

.menu-item {
    margin: 10px 0;
}

.menu-link {
    display: block;
    padding: 10px;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.menu-link:hover {
    background-color: #34495e;
}

/* Main Content */
.main-content {
    margin-left: 220px; /* Offset for sidebar */
    padding: 20px;
    background-color: #f4f4f4;
}

    </style>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-logo">
                <img src="{{ asset('aset/logoasli.png') }}" alt="Logo">
            </div>
            <div class="user-dropdown">
                <img src="{{ asset('aset/user.jpg') }}" alt="User Image" class="user-image">
                <div class="dropdown">
                    <button class="dropdown-toggle">P</button>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('profile') }}" class="menu-link">Profile</a></li>
                        <li><a href="{{ url('logout') }}" class="menu-link">Logout</a></li>
                    </ul>
                </div>
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

    <script src="{{ asset('js/sidebar.js') }}"></script>

    <!-- Main Content -->
    <main class="main-content w-full">
        @yield('konten')
    </main>
    <script src="{{ asset('js/sidebar.js') }}"></script>

    <!-- Main Content -->
    <main class="main-content w-full">
        @yield('konten')
    </main>

    <!-- JavaScript for Dropdown -->
    <script>
        // Mendapatkan elemen dropdown
        const dropdownButton = document.querySelector('.dropdown-toggle');
        const dropdownMenu = document.querySelector('#dropdownMenu');

        // Menambahkan event listener untuk toggle menu saat diklik
        dropdownButton.addEventListener('click', function () {
            dropdownMenu.classList.toggle('show');
        });
    </script>

</body>
</html>
