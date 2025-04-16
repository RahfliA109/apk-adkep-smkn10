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
    <div class="judul">
        <h1>BIODATA DIRI</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(isset($biodata))
        <div class="blok">
            <div class="kiri">
                <img src="{{ asset('storage/' . $biodata->foto) }}" alt="Foto Profil">
            </div>
            <div class="kanan">
                <table>
                    <tr><th>Nama</th><td>{{ $biodata->nama }}</td></tr>
                    <tr><th>Tempat Lahir</th><td>{{ $biodata->tempat_lahir }}</td></tr>
                    <tr><th>Tanggal Lahir</th><td>{{ \Carbon\Carbon::parse($biodata->tanggal_lahir)->format('d M Y') }}</td></tr>
                    <tr><th>Jenis Kelamin</th><td>{{ $biodata->jenis_kelamin }}</td></tr>
                    <tr><th>Agama</th><td>{{ $biodata->agama }}</td></tr>
                    <tr><th>Status Kawin</th><td>{{ $biodata->status_kawin }}</td></tr>
                    <tr><th>Alamat</th><td>{{ $biodata->alamat_ktp }}</td></tr>
                    <tr><th>No. HP</th><td>{{ $biodata->no_hp }}</td></tr>
                    <tr><th>Email</th><td>{{ $biodata->email }}</td></tr>
                    <tr>
                        <th>Scan KTP</th>
                        <td>
                            @if($biodata->scan_ktp)
                                <a href="{{ asset('storage/' . $biodata->scan_ktp) }}" target="_blank">Lihat Scan KTP</a>
                            @else
                                Tidak ada scan KTP
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="aksi">
            <a href="{{ route('biodata.edit', $biodata->id) }}" class="btn-edit">Edit</a>

            <form action="{{ route('biodata.destroy', $biodata->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus biodata ini?')">Hapus</button>
            </form>
        </div>

    @elseif(isset($message))
        <div class="alert alert-warning">
            {{ $message }}
        </div>
    @endif
</div>
@endsection
