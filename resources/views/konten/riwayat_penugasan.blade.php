@extends('sidebar.sidebar')
<link rel="stylesheet" href="css/app.css">
<style>
    /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

form {
    background-color: #fff;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
}

h2 {
    margin-top: 0;
    color: #333;
    text-align: center;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
}

input[type="text"],
input[type="number"],
input[type="file"],
select,
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    margin-bottom: 15px;
}

input[type="text"]:focus,
input[type="number"]:focus,
input[type="file"]:focus,
select:focus,
textarea:focus {
    border-color: #66afe9;
    outline: none;
    box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
}

textarea {
    resize: vertical;
    height: 100px;
}

button[type="submit"] {
    background-color: #28a745;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
}

button[type="submit"]:hover {
    background-color: #218838;
}

.row {
    display: flex;
    gap: 15px;
}

.row div {
    flex: 1;
}

/* Responsive Design */
@media (max-width: 768px) {
    .row {
        flex-direction: column;
    }
}
</style>

@section('konten')
    <form action="/submit-riwayat-pendidikan" method="POST" enctype="multipart/form-data">
        <h2>Form Riwayat Pendidikan Pegawai</h2>

        <!-- Nama Institusi -->
        <div>
            <label for="nama_institusi">Nama Sekolah/Universitas:</label>
            <input type="text" id="nama_institusi" name="nama_institusi" required>
        </div>

        <!-- Jenjang Pendidikan -->
        <div>
            <label for="jenjang_pendidikan">Jenjang Pendidikan:</label>
            <select id="jenjang_pendidikan" name="jenjang_pendidikan" required>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
                <option value="D3">D3</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
            </select>
        </div>

        <!-- Jurusan/Program Studi -->
        <div>
            <label for="jurusan">Jurusan/Program Studi:</label>
            <input type="text" id="jurusan" name="jurusan">
        </div>

        <!-- Tahun Masuk dan Tahun Lulus -->
        <div class="row">
            <div>
                <label for="tahun_masuk">Tahun Masuk:</label>
                <input type="number" id="tahun_masuk" name="tahun_masuk" required>
            </div>
            <div>
                <label for="tahun_lulus">Tahun Lulus:</label>
                <input type="number" id="tahun_lulus" name="tahun_lulus" required>
            </div>
        </div>

        <!-- Gelar -->
        <div>
            <label for="gelar">Gelar yang Diperoleh:</label>
            <input type="text" id="gelar" name="gelar">
        </div>

        <!-- Lokasi Institusi -->
        <div>
            <label for="lokasi">Lokasi Sekolah/Universitas:</label>
            <input type="text" id="lokasi" name="lokasi">
        </div>

        <!-- Status Pendidikan -->
        <div>
            <label for="status">Status Pendidikan:</label>
            <select id="status" name="status">
                <option value="Lulus">Lulus</option>
                <option value="Belum Lulus">Belum Lulus</option>
            </select>
        </div>

        <!-- Dokumen Pendukung -->
        <div>
            <label for="dokumen">Upload Ijazah/Transkrip:</label>
            <input type="file" id="dokumen" name="dokumen" accept=".pdf,.doc,.docx">
        </div>

        <!-- Keterangan Tambahan -->
        <div>
            <label for="keterangan">Keterangan Tambahan:</label>
            <textarea id="keterangan" name="keterangan" placeholder="Misalnya, pelatihan atau kursus yang relevan"></textarea>
        </div>

        <!-- Tombol Submit -->
        <button type="submit">Simpan</button>
    </form>
@endsection
