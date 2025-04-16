@extends('layout.sidebar')

@section('konten')
<style>
    .form-container {
        max-width: 800px;
        margin: 30px auto;
        background: #fff;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #2c3e50;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .form-group input, .form-group select, .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    .form-group img {
        width: 150px;
        height: auto;
        margin-top: 10px;
        border-radius: 8px;
    }

    .form-actions {
        text-align: center;
        margin-top: 20px;
    }

    .form-actions button {
        padding: 10px 30px;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        background-color: #27ae60;
        color: white;
        cursor: pointer;
    }

    .form-actions a {
        margin-left: 15px;
        color: #e74c3c;
        text-decoration: none;
    }

    .form-actions button:hover {
        background-color: #219150;
    }
</style>

<div class="form-container">
    <h2>Edit Biodata</h2>

    <form action="{{ route('biodata.update', $biodata->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $biodata->nama) }}" required>
        </div>

        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $biodata->tempat_lahir) }}">
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $biodata->tanggal_lahir) }}">
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin">
                <option value="Laki-laki" {{ $biodata->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $biodata->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label>Agama</label>
            <input type="text" name="agama" value="{{ old('agama', $biodata->agama) }}">
        </div>

        <div class="form-group">
            <label>Status Kawin</label>
            <select name="status_kawin">
                <option value="Belum Kawin" {{ $biodata->status_kawin == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                <option value="Kawin" {{ $biodata->status_kawin == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                <option value="Cerai Hidup" {{ $biodata->status_kawin == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                <option value="Cerai Mati" {{ $biodata->status_kawin == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
            </select>
        </div>

        <div class="form-group">
            <label>Alamat KTP</label>
            <textarea name="alamat_ktp" rows="3">{{ old('alamat_ktp', $biodata->alamat_ktp) }}</textarea>
        </div>

        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="no_hp" value="{{ old('no_hp', $biodata->no_hp) }}">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $biodata->email) }}">
        </div>

        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto">
            @if($biodata->foto)
                <img src="{{ asset('storage/' . $biodata->foto) }}" alt="Foto Lama">
            @endif
        </div>

        <div class="form-group">
            <label>Scan KTP</label>
            <input type="file" name="scan_ktp">
            @if($biodata->scan_ktp)
                <a href="{{ asset('storage/' . $biodata->scan_ktp) }}" target="_blank">Lihat Scan KTP Lama</a>
            @endif
        </div>

        <div class="form-actions">
            <button type="submit">Simpan Perubahan</button>
            <a href="{{ url()->previous() }}">Batal</a>
        </div>
    </form>
</div>
@endsection
