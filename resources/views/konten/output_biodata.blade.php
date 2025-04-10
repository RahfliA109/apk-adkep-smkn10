@extends('sidebar.sidebar')
<link rel="stylesheet" href="/css/form-input.css">
<title>Hasil Biodata</title>

@section('konten')
<div class="container mx-auto py-8">
    <h2>Biodata Diri </h2>

    <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" value="{{ $data->nama }}" readonly>
    </div>
    <div class="form-group">
        <label>NIK</label>
        <input type="text" value="{{ $data->nik }}" readonly>
    </div>
    <div class="form-group">
        <label>NUPTK/NIP</label>
        <input type="text" value="{{ $data->nuptk_nip }}" readonly>
    </div>
    <div class="form-group">
        <label>Tempat, Tanggal Lahir</label>
        <input type="text" value="{{ $data->tempat_lahir }}" readonly>
        <input type="date" value="{{ $data->tanggal_lahir }}" readonly>
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <input type="text" value="{{ $data->jenis_kelamin }}" readonly>
    </div>
    <div class="form-group">
        <label>Agama</label>
        <input type="text" value="{{ $data->agama }}" readonly>
    </div>
    <div class="form-group">
        <label>Status Kawin</label>
        <input type="text" value="{{ $data->status_kawin }}" readonly>
    </div>
    <div class="form-group">
        <label>Alamat KTP</label>
        <textarea readonly>{{ $data->alamat_ktp }}</textarea>
    </div>
    <div class="form-group">
        <label>No HP</label>
        <input type="text" value="{{ $data->no_hp }}" readonly>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" value="{{ $data->email }}" readonly>
    </div>

    <div class="form-group">
        <label>Foto</label><br>
        @if($data->foto)
            <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto" width="150">
        @else
            <p>Tidak ada foto.</p>
        @endif
    </div>

    <div class="form-group">
        <label>Scan KTP</label><br>
        @if($data->scan_ktp)
            <a href="{{ asset('storage/' . $data->scan_ktp) }}" target="_blank">Lihat File</a>
        @else
            <p>Tidak ada file KTP.</p>
        @endif
    </div>

    {{-- Tombol Edit & Delete --}}
    <div class="form-group mt-4">
        <a href="{{ route('datadiri.edit', $data->id) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('datadiri.destroy', $data->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus biodata ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
</div>
@endsection
