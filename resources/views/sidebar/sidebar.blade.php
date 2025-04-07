<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Font Awesome for Icons -->
    <style>
        /* Sidebar Styling */
        .sidebar {
            background: linear-gradient(to bottom, #6a1b9a, #9c27b0); /* Gradasi ungu yang modern */
            position: fixed; /* Sidebar tetap saat scroll */
            top: 0; 
            left: 0; 
            width: 170px; 
            height: 110vh;
            padding: 20px;
            z-index: 1000;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            border-radius: 4px;
            margin-bottom: 10px;
            text-align: left;
            transition: all 0.3s ease;
            font-size: 16px;
            display: flex;
            align-items: center; /* Align icon and text */
        }

        .sidebar a i {
            margin-right: 10px; /* Space between icon and text */
        }

        .sidebar a:hover {
            background-color: #FFD700; /* Emas */
            color: #4A148C; /* Dark Purple when hovered */
            transform: translateX(10px); /* Efek geser saat hover */
        }

        .sidebar .active {
            background-color: #FFD700;
            font-weight: bold;
            color: #4A148C; /* Dark Purple when active */
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            opacity: 0;
            animation: fadeIn 0.5s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .sidebar ul li:nth-child(1) { animation-delay: 0.2s; }
        .sidebar ul li:nth-child(2) { animation-delay: 0.4s; }
        .sidebar ul li:nth-child(3) { animation-delay: 0.6s; }
        .sidebar ul li:nth-child(4) { animation-delay: 0.8s; }

        /* Main Content Styling */
        .main-content {
            margin-left: 170px; /* Memberikan ruang untuk sidebar yang tetap */
            padding: 20px;
            overflow-y: auto; /* Memastikan konten bisa di-scroll */
            background-color: #f5f5f5; /* Latar belakang konten lebih terang */
            min-height: 100vh;
        }

    </style>
</head>
<body class="font-sans antialiased">
    <div class="flex">
        <!-- Sidebar -->
        <div class="sidebar">
        <h2 class="text-3xl text-white mb-6"><a href="{{ route('konten.dashboard') }}">Dashboard</a></h2>
            <ul>
                <li><a href="datadiri" class="block py-2 px-4 hover:bg-yellow-500"><i class="fas fa-user"></i>Biodata</a></li>
                <li><a href="sertifikat" class="block py-2 px-4 hover:bg-yellow-500"><i class="fas fa-certificate"></i>Riwayat Menikah</a></li>
                <li><a href="pendidikan" class="block py-2 px-4 hover:bg-yellow-500"><i class="fas fa-graduation-cap"></i>Riwayat Pendidikan</a></li>
                <li><a href="penugasan" class="block py-2 px-4 hover:bg-yellow-500"><i class="fas fa-briefcase"></i>Riwayat Penugasan</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content w-full p-8">
            @yield('konten')
        </div>
    </div>
</body>
</html>
