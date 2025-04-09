@extends('sidebar.sidebar')
<link rel="stylesheet" href="{{ asset('css/form-input.css') }}">
<title>Edit Biodata</title>

@section('konten')
<div class="container mx-auto py-8">
    <h2>Edit Biodata</h2>
    <form action="{{ route('datadiri.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Copy semua input dari form datadiri.blade.php, tapi hilangkan atribut readonly & disabled -->
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="{{ $data->nama }}" required>
        </div>
        <div class="form-group">
            <label>NIK</label>
            <input type="text" name="nik" value="{{ $data->nik }}" required>
        </div>
        <div class="form-group">
            <label>NUPTK/NIP</label>
            <input type="text" name="nuptk_nip" value="{{ $data->nuptk_nip }}" required>
        </div>
        <div class="form-group">
            <label>Tempat, Tanggal Lahir</label>
            <input type="text" name="tempat_lahir" value="{{ $data->tempat_lahir }}" required>
            <input type="date" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" required>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Agama</label>
            <input type="text" name="agama" value="{{ $data->agama }}" required>
        </div>
        <div class="form-group">
            <label>Status Kawin</label>
            <select name="status_kawin" required>
                <option value="Belum Kawin" {{ $data->status_kawin == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                <option value="Kawin" {{ $data->status_kawin == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                <option value="Duda/Janda" {{ $data->status_kawin == 'Duda/Janda' ? 'selected' : '' }}>Duda/Janda</option>
            </select>
        </div>

        <div class="form-group">
            <label>Alamat KTP</label>
            <textarea name="alamat_ktp" required>{{ $data->alamat_ktp }}</textarea>
        </div>
        <div class="form-group">
            <label>No HP</label>
            <input type="tel" name="no_hp" value="{{ $data->no_hp }}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ $data->email }}" required>
        </div>

        <div class="form-group">
            <label>Upload Foto</label>
            @if ($data->foto)
                <p><a href="{{ asset('storage/' . $data->foto) }}" target="_blank">Lihat Foto</a></p>
            @endif
            <input type="file" name="foto" accept="image/jpeg">
        </div>

        <div class="form-group">
            <label>Upload Scan KTP</label>
            @if ($data->scan_ktp)
                <p><a href="{{ asset('storage/' . $data->scan_ktp) }}" target="_blank">Lihat KTP</a></p>
            @endif
            <input type="file" name="scan_ktp" accept="application/pdf, image/*">
        </div>

        <button type="submit">Simpan Perubahan</button>
    </form>
</div>
@endsection
