<!-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Mode Background */
        body.light {
            background-color: #e8f0fe;
            color: #1e293b;
        }

        body.dark {
            background-color: #1a1a2e;
            color: black;
        }

        .sidebar a .dark{
            color:white;
        }

        .sidebar {
            background-color:#d2f1f9;;
            position: fixed;
            top: 0; 
            left: 0; 
            width: 170px; 
            height: 110vh;
            padding: 20px;
            z-index: 1000;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
        }


        
        .sidebar a {
            color: black;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 4px;
            margin-bottom: 10px;
            font-size: 16px;
            display: flex;
            align-items: center;
            transition:all 0.3s ease;
        }


        .sidebar-hover-anim:hover {
           background-color: #bae6fd; /* biru muda lembut */
           color: #1e3a8a; /* biru navy gelap */
           transform: translateX(6px);
           box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
        }


        /* Navbar */
        .navbar {
            background-color:#d2f1f9;;
            height: 64px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            position: fixed;
            top: 0;
            left: 170px; /* Sesuaikan dengan lebar sidebar */
            right: 0;
            z-index: 1100;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .profile-img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
        }

        .toggle-switch {
            display: flex;
            align-items: center;
        }

        .switch-label {
            margin-right: 8px;
        }

        /* Toggle gaya sederhana */
        .toggle-bg {
            width: 50px;
            height: 24px;
            background-color: #ddd;
            border-radius: 9999px;
            position: relative;
            cursor: pointer;
        }

        .toggle-circle {
            width: 20px;
            height: 20px;
            background-color: white;
            border-radius: 50%;
            position: absolute;
            top: 2px;
            left: 2px;
            transition: transform 0.3s;
        }

        .dark .toggle-circle {
            transform: translateX(26px);
            background-color: #FFD700;
        }

        .main-content {
            margin-left: 170px;
            margin-top: 64px;
            padding: 20px;
            min-height: calc(100vh - 64px);
        }

        /* gambar logo sidebar */
        .gambarsidebar{
            height: 40px;           /* Menyesuaikan tinggi navbar */
            width: px;            /* Biar proporsional */
            object-fit: contain;    /* Tidak terpotong */
            margin-top: 4px;     
        }

    </style>
</head>
<body class="light">

    
    <div class="sidebar">
        <h2><a href="dashboard"><img src="aset/logoutama.png" class="gambarsidebar"></a></h2>
        <ul>
            <li><a href="datadiri" class="sidebar-hover-anim"><i class="fas fa-user"></i>Biodata</a></li>
            <li><a href="menikah" class="sidebar-hover-anim"><i class="fas fa-certificate"></i>Riwayat Menikah</a></li>
            <li><a href="pendidikan" class="sidebar-hover-anim"><i class="fas fa-graduation-cap"></i>Riwayat Pendidikan</a></li>
            <li><a href="penugasan" class="sidebar-hover-anim"><i class="fas fa-briefcase"></i>Riwayat Penugasan</a></li>
        </ul>
    </div>

    
    <div class="navbar">
        <div class="hamburger bar">

        </div>

        <div class="flex items-center gap-4">
     
            <div class="toggle-switch">
                <span class="switch-label">☀️</span>
                <div class="toggle-bg" id="toggleMode">
                    <div class="toggle-circle"></div>
                </div>
                <span class="switch-label">🌙</span>
            </div>

           
            <img src="#" alt="Profil" class="profile-img">
        </div>
    </div>

    
    <div class="main-content w-full">
        @yield('konten')
    </div>

    
    <script>
        const toggle = document.getElementById('toggleMode');
        const body = document.body;

        // Saat halaman diload
        document.addEventListener('DOMContentLoaded', () => {
            const saved = localStorage.getItem('mode');
            if (saved === 'dark') {
                body.classList.remove('light');
                body.classList.add('dark');
            }
        });

        toggle.addEventListener('click', () => {
            const isDark = body.classList.toggle('dark');
            body.classList.toggle('light', !isDark);
            localStorage.setItem('mode', isDark ? 'dark' : 'light');
        });
    </script>
</body>
</html> -->
