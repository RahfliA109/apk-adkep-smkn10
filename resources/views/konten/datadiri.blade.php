@extends('sidebar.sidebar')
<link rel="stylesheet" href="/css/form-input.css">
<title>Biodata</title>

@section('konten')
<div class="container mx-auto py-8 fade-in">

    @if(session('biodata'))
        {{-- Tampilan Output --}}
        <h2>Biodata Diri</h2>
        @php $data = session('biodata'); @endphp

        <div class="form-group">
            <label>Nama</label>
            <input type="text" value="{{ $data['nama'] }}" readonly>
        </div>

        <div class="form-group">
            <label>NIK</label>
            <input type="text" value="{{ $data['nik'] }}" readonly>
        </div>

        <div class="form-group">
            <label>NUPTK/NIP</label>
            <input type="text" value="{{ $data['nuptk_nip'] }}" readonly>
        </div>

        <div class="form-group">
            <label>Tempat, Tanggal Lahir</label>
            <input type="text" value="{{ $data['tempat_lahir'] }}" readonly>
            <input type="date" value="{{ $data['tanggal_lahir'] }}" readonly>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <input type="text" value="{{ $data['jenis_kelamin'] }}" readonly>
        </div>

        <div class="form-group">
            <label>Agama</label>
            <input type="text" value="{{ $data['agama'] }}" readonly>
        </div>

        <div class="form-group">
            <label>Status Kawin</label>
            <input type="text" value="{{ $data['status_kawin'] }}" readonly>
        </div>

        <div class="form-group">
            <label>Alamat KTP</label>
            <textarea readonly>{{ $data['alamat_ktp'] }}</textarea>
        </div>

        <div class="form-group">
            <label>No HP</label>
            <input type="text" value="{{ $data['no_hp'] }}" readonly>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" value="{{ $data['email'] }}" readonly>
        </div>

        <div class="form-group">
            <label>Foto</label><br>
            @if(isset($data['foto']))
                <img src="{{ asset('storage/' . $data['foto']) }}" alt="Foto" width="150">
            @else
                <p>Tidak ada foto.</p>
            @endif
        </div>

        <div class="form-group">
            <label>Scan KTP</label><br>
            @if(isset($data['scan_ktp']))
                <a href="{{ asset('storage/' . $data['scan_ktp']) }}" target="_blank">Lihat File</a>
            @else
                <p>Tidak ada file KTP.</p>
            @endif
        </div>

        {{-- Tombol Edit --}}
        <a href="{{ url('/datadiri/edit/' . $data['id']) }}">
            <button type="button">Edit Data</button>
        </a>

        {{-- Tombol Hapus --}}
        <form action="{{ url('/datadiri/hapus/' . $data['id']) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus Data</button>
        </form>

    @else
        {{-- Form Input --}}
        <h2>Form Biodata</h2>

        <form action="/datadiri" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" required>
            </div>

            <div class="form-group">
                <label>NIK</label>
                <input type="text" name="nik" required>
            </div>

            <div class="form-group">
                <label>NUPTK/NIP</label>
                <input type="text" name="nuptk_nip" required>
            </div>

            <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" required>
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" required>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" required>
            </div>

            <div class="form-group">
                <label>Agama</label>
                <input type="text" name="agama" required>
            </div>

            <div class="form-group">
                <label>Status Kawin</label>
                <input type="text" name="status_kawin" required>
            </div>

            <div class="form-group">
                <label>Alamat KTP</label>
                <textarea name="alamat_ktp" required></textarea>
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto">
            </div>

            <div class="form-group">
                <label>Scan KTP</label>
                <input type="file" name="scan_ktp">
            </div>

            <button type="submit">Simpan</button>
        </form>
    @endif
</div>
@endsection
