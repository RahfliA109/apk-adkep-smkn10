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
        padding: 15px;
        border-radius: 5px;
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
        border-radius: 50%;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
    }

    .kiri img:hover {
        transform: scale(1.05);
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
        width: 180px;
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

    .button {
        display: inline-block;
        margin: 0 10px;
        padding: 10px 20px;
        font-weight: bold;
        text-decoration: none;
        border-radius: 8px;
        transition: background 0.3s;
    }

    .btn-edit {
        background-color: #3498db;
        color: white;
    }

    .btn-edit:hover {
        background-color: #2980b9;
    }

    .btn-hapus {
        background-color: #e74c3c;
        color: white;
        border: none;
    }

    .btn-hapus:hover {
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
    <div class="judul">
        <h1>RIWAYAT MENIKAH</h1>    
    </div>

    @if($riwayatMenikah)
        <div class="blok">
            <div class="kiri">
                @if(auth()->user()->gambar)
                    <img 
                        src="{{ asset(auth()->user()->gambar) }}" 
                        alt="Foto Profil">
                @else
                    <img 
                        src="{{ asset('aset/userimage.png') }}" 
                        alt="Default Foto">
                @endif
            </div>

            <div class="kanan">
                <table>
                    <tr><th>Status</th><td>{{ $riwayatMenikah->status_perkawinan }}</td></tr>
                    <tr><th>Tanggal</th><td>{{ \Carbon\Carbon::parse($riwayatMenikah->tanggal_menikah_cerai)->translatedFormat('d F Y') }}</td></tr>
                    <tr><th>Nama Pasangan</th><td>{{ $riwayatMenikah->nama_pasangan }}</td></tr>
                    <tr><th>Pekerjaan Pasangan</th><td>{{ $riwayatMenikah->pekerjaan_pasangan }}</td></tr>
                    <tr><th>Jumlah Anak</th><td>{{ $riwayatMenikah->jumlah_anak }}</td></tr>
                    <tr>
                        <td>Akta Nikah/Cerai</td>
                        <td>
                            @if ($riwayatMenikah->akta_nikah)
                                <a href="{{ asset('storage/akta_nikah/' . $riwayatMenikah->akta_nikah) }}" target="_blank">Lihat Dokumen</a>
                            @else
                                <em>Tidak ada data</em>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="aksi">
            <a href="{{ route('riwayatMenikah.edit', $riwayatMenikah->id) }}" class="button btn-edit">Edit</a>

            <form action="{{ route('riwayatMenikah.destroy', $riwayatMenikah->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')" class="button btn-hapus">Hapus</button>
            </form>
        </div>
    @else
        <div class="alert alert-warning">
            <strong>Data riwayat menikah tidak ditemukan!</strong> Silakan lengkapi informasi riwayat menikah Anda melalui form input.
        </div>

        <div class="aksi">
            <a href="{{ route('riwayatMenikah.create') }}" class="button btn-edit">Tambah Data</a>
        </div>
    @endif
</div>

@endsection
