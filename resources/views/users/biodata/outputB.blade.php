@extends('layout.sidebar')

<style>
* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}

body {
	font-family: monospace;
	font-size: 13pt;
	background-color: #2c3e50; /* warna senada sidebar/nav */
	color: black; /* warna teks cerah */
}

.konten {
	width: calc(100% - 250px);
	margin-left: 250px;
	margin-top: 60px;
	padding: 20px;
	min-height: calc(100vh - 60px);
}

.kotak {
	background: white; /* warna abu gelap */
	border: none;
	width: 100%;
	max-width: 1000px;
	margin: auto;
	padding: 20px;
	box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
	border-radius: 10px;
}

.judul {
	text-align: center;
	background: #f1c40f; /* kuning seperti sebelumnya */
	padding: 10px;
	margin-bottom: 20px;
	color: #000;
	border-radius: 5px;
}

img {
	width: 200px;
	height: auto;
	margin-bottom: 10px;
	border-radius: 5px;
}

.blok {
	margin-bottom: 20px;
}

.kiri {
	width: 100%;
	float: left;
}

.kanan {
	width: 100%;
	float: left;
	padding: 0px 20px;
}

table {
	width: 100%;
	border-collapse: collapse;
}

th, td {
	text-align: left;
	padding: 8px;
	color: black;
}

a {
	color: #1abc9c;
	text-decoration: none;
}

a:hover {
	text-decoration: underline;
}

ul {
	padding-left: 20px;
}

@media only screen and (max-width: 768px) {
	.konten {
		margin-left: 0;
		width: 100%;
		padding: 10px;
	}

	.kotak {
		width: 100%;
		padding: 10px;
	}

	.kiri,
	.kanan {
		width: 100%;
		float: none;
		padding: 0;
	}
}
</style>

@section('konten')
<div class="kotak">
	<div class="judul">
		<h1>BIODATA DIRI</h1>
	</div>

	<div class="blok">
		<h2>Informasi</h2>
		<div class="kiri">
			<img src="aset/userimage.png">
		</div>
		<div class="kanan">
			<table>
				<tr><th>Nama</th><th>:</th><td>Santono Sujatmiko</td></tr>
				<tr><th>Tempat</th><th>:</th><td>Medan</td></tr>
				<tr><th>Tgl.Lahir</th><th>:</th><td>15 September 1994</td></tr>
				<tr><th>Agama</th><th>:</th><td>Islam</td></tr>
				<tr><th>Alamat</th><th>:</th><td>Jl. Merpati Putih, No. 187, Blok - Cimahi, Bandung</td></tr>
				<tr><th>Email</th><th>:</th><td>santono@malasngoding.com</td></tr>
				<tr><th>No.HP</th><th>:</th><td>+62812-3456-7890</td></tr>
				<tr><th>Website</th><th>:</th><td><a href="https://www.malasngoding.com">www.malasngoding.com</a></td></tr>
			</table>
		</div>
		<div style="clear: both;"></div>
	</div>

	<div class="blok">
		<h2>Pendidikan</h2>
		<ul>
			<li><b>2000 - 2006</b> SD 1 Negeri Medan</li>
			<li><b>2006 - 2009</b> SMP 1 Negeri Jakarta</li>
			<li><b>2009 - 2012</b> SMA 1 Negeri Jakarta</li>
			<li><b>2012 - 2016</b> Universitas Indonesia</li>
		</ul>
	</div>

	<div class="blok">
		<h2>Pengalaman Kerja</h2>
		<ul>
			<li><b>2017 - 2019</b> - <i>Back-End Developer</i> - di PT. Teknologi Indonesia</li>
			<li><b>2020 - Now</b> - <i>Full Stack Developer</i> - di PT. BOX Tech AI Indonesia</li>
		</ul>
	</div>

	<div class="blok">
		<h2>Keahlian</h2>
		<ul>
			<li>HTML</li>
			<li>CSS</li>
			<li>JavaScript</li>
			<li>PHP</li>
			<li>CodeIgniter</li>
			<li>Laravel</li>
			<li>NodeJS</li>
		</ul>
	</div>
</div>
@endsection
