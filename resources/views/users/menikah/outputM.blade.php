@extends('layout.sidebar')
@section('konten')
<style>
    .kotak {
        padding: 30px;
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        max-width: 900px;
        margin: 30px auto;
    }

    .judul h1 {
        text-align: center;
        font-size: 28px;
        margin-bottom: 30px;
        font-weight: bold;
        color: #333;
    }

    .alert {
        margin-bottom: 20px;
    }

    .blok {
        display: flex;
        flex-wrap: wrap;
    }

    .kiri {
        flex: 1;
        text-align: center;
        margin-bottom: 20px;
    }

    .kiri img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #ddd;
    }

    .kanan {
        flex: 2;
        padding-left: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th {
        text-align: left;
        width: 150px;
        padding: 8px 0;
        color: #555;
    }

    table td {
        padding: 8px 0;
        color: #333;
    }

    .aksi {
        margin-top: 30px;
        text-align: center;
    }

    .aksi a {
        display: inline-block;
        margin: 0 10px;
        padding: 10px 20px;
        font-weight: bold;
        text-decoration: none;
        border-radius: 8px;
        transition: background 0.3s;
    }

    .aksi .btn-edit {
        background-color: #3498db;
        color: white;
    }

    .aksi .btn-edit:hover {
        background-color: #2980b9;
    }

    .aksi .btn-hapus {
        background-color: #e74c3c;
        color: white;
    }

    .aksi .btn-hapus:hover {
        background-color: #c0392b;
    }

    @media (max-width: 768px) {
        .blok {
            flex-direction: column;
        }

        .kanan {
            padding-left: 0;
        }

        .kiri {
            margin-bottom: 20px;
        }
    }
</style>
<div class="kotak">
    <h2>Data Riwayat Menikah</h2>
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    <table>
        <tr><th>Status</th><td>{{ $data->status_perkawinan }}</td></tr>
        <tr><th>Tanggal</th><td>{{ $data->tanggal_menikah_cerai }}</td></tr>
        <tr><th>Nama Pasangan</th><td>{{ $data->nama_pasangan }}</td></tr>
        <tr><th>Pekerjaan Pasangan</th><td>{{ $data->pekerjaan_pasangan }}</td></tr>
        <tr><th>Jumlah Anak</th><td>{{ $data->jumlah_anak }}</td></tr>
        <tr><th>Akta</th><td>
            @if($data->akta_nikah)
                <a href="{{ asset('storage/' . $data->akta_nikah) }}" target="_blank">Lihat Dokumen</a>
            @else
                Tidak ada file
            @endif
        </td></tr>
    </table>
    <br>
    <a href="{{ route('riwayatMenikah.edit') }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('riwayatMenikah.destroy') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger">Hapus</button>
    </form>
</div>
@endsection
