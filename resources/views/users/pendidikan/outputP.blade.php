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

    /* Gambar Profil - Bulat dengan Border */
    .kiri img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%; /* Membuat gambar menjadi bulat */
        border: 4px solid none; /* Border biru */
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2); /* Bayangan yang lebih tebal */
        transition: transform 0.3s ease; /* Transisi saat hover */
    }

    .kiri img:hover {
        transform: scale(1.05); /* Zoom in sedikit saat hover */
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
        text-decoration: none;
        border-radius: 8px;
        transition: background 0.3s;
    }

    .button{
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

    .btn-hapus {
        background-color: #e74c3c;
        color: white;
        display: inline-block;
        margin: 0 10px;
        padding: 10px 20px;
        border:none;
        text-decoration: none;
        border-radius: 8px;
        transition: background 0.3s;
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
    <div class="judul">
        <h1>RIWAYAT PENDIDIKAN</h1>
    </div>

    @if(isset($pendidikan))
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
    <h4 style="margin-bottom: 15px;">Pendidikan Formal</h4>
    <table>
        <tr><th>Jenjang Pendidikan</th><td>{{ $pendidikan->jenjang_pendidikan }}</td></tr>
        <tr><th>Nama Institusi</th><td>{{ $pendidikan->nama_institusi }}</td></tr>
        <tr><th>Jurusan</th><td>{{ $pendidikan->jurusan }}</td></tr>
        <tr><th>Tahun Lulus</th><td>{{ $pendidikan->tahun_lulus }}</td></tr>
        <tr><th>Nama Pelatihan</th><td>{{ $pendidikan->nama_pelatihan }}</td></tr>
        <tr><th>Penyelenggara</th><td>{{ $pendidikan->penyelenggara_pelatihan }}</td></tr>
        <tr><th>Tahun Pelatihan</th><td>{{ $pendidikan->tahun_pelatihan }}</td></tr>
        <tr><th>Ijazah</th>
            <td>
                @if ($pendidikan->ijazah)
                    <a href="{{ asset('storage/' . $pendidikan->ijazah) }}" target="_blank">Lihat Ijazah</a>
                @else
                    Tidak Ada
                @endif
            </td>
        </tr>
        <tr><th>Sertifikat Pelatihan</th>
            <td>
                @if ($pendidikan->sertifikat_pelatihan)
                    <a href="{{ asset('storage/' . $pendidikan->sertifikat_pelatihan) }}" target="_blank">Lihat Sertifikat</a>
                @else
                    Tidak Ada
                @endif
            </td>
        </tr>
    </table>

    <h4 style="margin-top: 30px; margin-bottom: 15px;">Pendidikan Non-Formal</h4>
    <table>
        <tr><th>Nama Pelatihan</th><td>{{ $pendidikan->nama_pelatihan ?? '-' }}</td></tr>
        <tr><th>Penyelenggara</th><td>{{ $pendidikan->penyelenggara_pelatihan ?? '-' }}</td></tr>
        <tr><th>Tahun Pelatihan</th><td>{{ $pendidikan->tahun_pelatihan ?? '-' }}</td></tr>
        <tr>
            <th>Sertifikat Pelatihan</th>
            <td>
                @if($pendidikan->sertifikat_pelatihan)
                    <a href="{{ asset('storage/' . $pendidikan->sertifikat_pelatihan) }}" target="_blank">Lihat Sertifikat</a>
                @else
                    Tidak ada file
                @endif
            </td>
        </tr>
    </table>
</div>

    </div>

        <div class="aksi">
            <a href="{{ route('riwayatPendidikan.edit', $pendidikan->id) }}" class="button btn-edit">Edit</a>

            <form action="{{ route('riwayatPendidikan.destroy', $pendidikan->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')" class="button btn-hapus">Hapus</button>
            </form>
        </div>

    @else
        <div class="alert alert-warning">Data tidak ditemukan.</div>
    @endif
</div>

@endsection
