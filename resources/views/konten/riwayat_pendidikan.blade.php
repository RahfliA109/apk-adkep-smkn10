<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard ADKEP</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background: #4BA3A5;
            color: white;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }

        .border{
            width:200px;
            height:100px;
            /* background-color:black; */


        }

        .sidebar img {
            width: 200px;
            height: auto;
            margin-bottom: 10px;
        }
        .sidebar h2 {
            margin: 10px 0;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            width: 100%;
        }
        .sidebar ul li {
            padding: 10px;
            cursor: pointer;
            color: white;
            text-align: center;
        }
        .sidebar ul li:hover {
            background: #D96C5F;
            color: white;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .navbar {
            background: #F3C677;
            padding: 15px;
            text-align: center;
            font-weight: bold;
        }
        .cards {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        .card {
            background: #D96C5F;
            color: white;
            padding: 20px;
            flex: 1;
            text-align: center;
            border-radius: 5px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background: #4BA3A5;
            color: white;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="border">
            <img src="asets/logoutama2.png" alt="Logo ADKEP">
        </div>
        <h2>ADKEP</h2>
        <ul>
            <li>Dashboard</li>
            <li>Data Pegawai</li>
            <li>Laporan</li>
            <li>Pengaturan</li>
        </ul>
    </div>
    <div class="content">
        <div class="navbar">Dashboard Administrasi Kepegawaian</div>
        <div class="cards">
            <div class="card">Total Pegawai: 120</div>
            <div class="card">Dokumen Arsip: 300</div>
            <div class="card">Pengguna Aktif: 45</div>
        </div>
        <table>
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>Agus Prasetyo</td>
                <td>Manager</td>
                <td>Aktif</td>
            </tr>
            <tr>
                <td>Siti Rahayu</td>
                <td>HRD</td>
                <td>Aktif</td>
            </tr>
            <tr>
                <td>Fajar Setiawan</td>
                <td>Staff</td>
                <td>Cuti</td>
            </tr>
        </table>
    </div>
</body>
</html>
