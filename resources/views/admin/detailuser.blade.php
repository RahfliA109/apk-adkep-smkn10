@extends('layout.sidebar')

<style>
    .kotak-tidak-ditemukan {
    padding: 20px;
    background-color: #ffffff;
    border: 1px solid #ddd; /* Menambahkan border */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Menambahkan shadow agar lebih elegan */
    margin: 10px 0;
    width: auto;
    display: inline-block; /* Agar ukuran kotak sesuai dengan konten */
    font-size: 1rem;
    color: #333;
}

    .fitur{
        width:30%;
        display:flex;
        justify-content:right;
        margin-top:30px;
    }

    .tombol {
        width:80px;
        border:1px black;
        border-radius:10px;
        color:rgba(255, 255, 255, 0.85);
        text-align:center;
        background-color:#FFD700;
        padding:8px;
        text-decoration:none;

    }

    .tombol:hover{
        background-color:#FFB300;;
        color:white;
    }


    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 8px 10px;
        vertical-align: top;
    }
    
    table td {
        text-align: left;
    }

    table th {
        text-align: left;
        width: 200px;
    }

    .kotak {
        padding: 30px;
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        max-width: 900px;
        margin: 30px auto;
    }

    /* General Form Styles */
    .form-input {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 8px;
        width: 100%;
        box-sizing: border-box;
        font-size: 1rem;
        line-height: 1.5;
        transition: border-color 0.3s;
    }

    .form-input:focus {
        outline: none;
        border-color: #4CAF50;
        background-color: #fff;
    }

    /* Label Styles */
    label {
        font-size: 0.875rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
        display: block;
    }

    /* Form Section Styles */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .mb-4 {
        margin-bottom: 1rem;
    }

    .mt-6 {
        margin-top: 1.5rem;
    }

    h2, h3 {
        color: #333;
        margin-bottom: 1rem;
    }

    h2 {
        font-size: 1.5rem;
        font-weight: 700;
    }

    h3 {
        font-size: 1.25rem;
        font-weight: 600;
    }

    hr {
        border-top: 1px solid #e0e0e0;
        margin: 20px 0;
    }

    /* Button Styles */
    button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }

    /* Textarea Styles */
    textarea.form-input {
        resize: vertical;
        height: 150px;
    }

    /* Error/Validation Message Styles */
    .error-message {
        color: red;
        font-size: 0.875rem;
        margin-top: 5px;
    }

    /* Flexbox for Input Groups */
    .input-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .input-group .form-input {
        width: calc(100% - 150px);
    }

    .input-group .input-button {
        margin-left: 10px;
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.875rem;
    }

    .input-group .input-button:hover {
        background-color: #45a049;
    }

    /* Responsive Styles */
    @media screen and (max-width: 768px) {
        .input-group {
            flex-direction: column;
        }

        .input-group .form-input {
            width: 100%;
            margin-bottom: 10px;
        }

        .input-group .input-button {
            width: 100%;
        }
    }
</style>

@section('konten')
<div class="container mx-auto py-8 px-4">
    <h2 class="text-xl font-bold mb-4 text-gray-800">Detail Data Akun: <b>{{ $user->nama }}</b></h2>
    
    
        @csrf
        @method('PUT')
        
        <!-- BIODATA -->
        @if($biodata)
        <div class="kotak">
            <h3 class="text-lg font-semibold mb-4 text-gray-800">Biodata</h3>
            <table>
                <tr>
                    <th style="text-align:right; white-space:nowrap;">Nama</th>
                    <th>:</th>
                    <td>{{ $biodata->nama }}</td>
                </tr>
                <tr>
                    <th style="text-align:right; white-space:nowrap;">Tempat Lahir</th>
                    <th>:</th>
                    <td>{{ $biodata->tempat_lahir }}</td>
                </tr>
                <tr>
                    <th style="text-align:right; white-space:nowrap;">Tanggal Lahir</th>
                    <th>:</th>
                    <td>{{ \Carbon\Carbon::parse($biodata->tanggal_lahir)->format('d M Y') }}</td>
                </tr>
                <tr>
                    <th style="text-align:right; white-space:nowrap;">Jenis Kelamin</th>
                    <th>:</th>
                    <td>{{ $biodata->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th style="text-align:right; white-space:nowrap;">Agama</th>
                    <th>:</th>
                    <td>{{ $biodata->agama }}</td>
                </tr>
                <tr>
                    <th style="text-align:right; white-space:nowrap;">Status Kawin</th>
                    <th>:</th>
                    <td>{{ $biodata->status_kawin }}</td>
                </tr>
                <tr>
                    <th style="text-align:right; white-space:nowrap;">Alamat</th>
                    <th>:</th>
                    <td>{{ $biodata->alamat_ktp }}</td>
                </tr>
                <tr>
                    <th style="text-align:right; white-space:nowrap;">No. HP</th>
                    <th>:</th>
                    <td>{{ $biodata->no_hp }}</td>
                </tr>
                <tr>
                    <th style="text-align:right; white-space:nowrap;">Email</th>
                    <th>:</th>
                    <td>{{ $biodata->email }}</td>
                </tr>
                <tr>
                    <th style="text-align:right; white-space:nowrap;">Scan KTP</th>
                    <th>:</th>
                    <td>
                        @if($biodata->scan_ktp)
                            <a href="{{ asset('storage/' . $biodata->scan_ktp) }}" target="_blank">Lihat Scan KTP</a>
                        @else
                            Tidak ada
                        @endif
                    </td>
                </tr>
            </table>
                <div class="fitur">
                    <a href="{{ route('biodata.edit', $biodata->id) }}" class="tombol"><b>edit</b></a>
                </div>
            </div>
        @else
            <div class="kotak">
                <p>Data biodata tidak ditemukan, silakan isi terlebih dahulu.</p>
            </div>
        @endif

        </div>
    

        
        <!-- RIWAYAT MENIKAH -->
        @if($riwayatMenikah)
        <div class="kotak">
            <h3 class="text-lg font-semibold mb-4 text-gray-800"> Riwayat Menikah</h3>
            <table>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Status</th>
                <th>:</th>
                <td>{{ $riwayatMenikah->status_perkawinan }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Tanggal</th>
                <th>:</th>
                <td>{{ \Carbon\Carbon::parse($riwayatMenikah->tanggal_menikah_cerai)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Nama Pasangan</th>
                <th>:</th>
                <td>{{ $riwayatMenikah->nama_pasangan }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Pekerjaan Pasangan</th>
                <th>:</th>
                <td>{{ $riwayatMenikah->pekerjaan_pasangan }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Jumlah Anak</th>
                <th>:</th>
                <td>{{ $riwayatMenikah->jumlah_anak }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Akta Nikah / Cerai</th>
                <th>:</th>
                <td>
                    @if($riwayatMenikah->akta_nikah)
                        <a href="{{ asset('storage/' . $riwayatMenikah->akta_nikah) }}" target="_blank">Lihat Dokumen</a>
                    @else
                        Tidak ada file
                    @endif
                </td>
            </tr>
            </table>
                <div class="fitur">
                      <a href="{{ route('riwayatMenikah.edit', $riwayatMenikah->id) }}" class="tombol"><b>edit</b></a>
                </div>
        </div>
        @else
            <div class="kotak">
                <p>Data Riwayat Menikah tidak ditemukan, silakan isi terlebih dahulu.</p>
            </div>
        @endif



        @if($pendidikan)
        <div class="kotak">
            <h3 class="text-lg font-semibold mb-4 text-gray-800">Pendidikan</h3>
            <table>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Jenjang Pendidikan</th>
                <th>:</th>
                <td>{{ $pendidikan->jenjang_pendidikan }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Nama Institusi</th>
                <th>:</th>
                <td>{{ $pendidikan->nama_institusi }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Jurusan</th>
                <th>:</th>
                <td>{{ $pendidikan->jurusan }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Tahun Lulus</th>
                <th>:</th>
                <td>{{ $pendidikan->tahun_lulus }}</td>
            </tr>
            <tr>
                <th><h3 class="text-lg font-semibold mb-4 text-gray-800">Pendidikan Non-Formal</h3></th>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Nama Pelatihan</th>
                <th>:</th>
                <td>{{ $pendidikan->nama_pelatihan }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Penyelenggara</th>
                <th>:</th>
                <td>{{ $pendidikan->penyelenggara_pelatihan }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Tahun Pelatihan</th>
                <th>:</th>
                <td>{{ $pendidikan->tahun_pelatihan }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Ijazah</th>
                <th>:</th>
                <td>
                    @if ($pendidikan->ijazah)
                        <a href="{{ asset('storage/' . $pendidikan->ijazah) }}" target="_blank">Lihat Ijazah</a>
                    @else
                        Tidak Ada
                    @endif
                </td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Sertifikat Pelatihan</th>
                <th>:</th>
                <td>
                    @if ($pendidikan->sertifikat_pelatihan)
                        <a href="{{ asset('storage/' . $pendidikan->sertifikat_pelatihan) }}" target="_blank">Lihat Sertifikat</a>
                    @else
                        Tidak Ada
                    @endif
                </td>
            </tr>
            </table>
                <div class="fitur">
                      <a href="{{ route('riwayatPendidikan.edit', $pendidikan->id) }}" class="tombol"><b>edit</b></a>
                </div>
        </div>
        @else
            <div class="kotak">
                <p>Data Riwayat Pendidikan tidak ditemukan, silakan isi terlebih dahulu.</p>
            </div>
        @endif

        @if($penugasan)
        <div class="kotak">
            <h3 class="text-lg font-semibold mb-4 text-gray-800">Riwayat Penugasan </h3>
            <table>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Nama Sekolah</th>
                <th>:</th>
                <td>{{ $penugasan->nama_sekolah ?? '-' }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Jabatan</th>
                <th>:</th>
                <td>{{ $penugasan->jabatan }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Mata Pelajaran</th>
                <th>:</th>
                <td>{{ $penugasan->mata_pelajaran ?? '-' }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Status Penugasan</th>
                <th>:</th>
                <td>{{ $penugasan->status_penugasan }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Tanggal Mulai</th>
                <th>:</th>
                <td>{{ $penugasan->tanggal_mulai }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Tanggal Selesai</th>
                <th>:</th>
                <td>{{ $penugasan->tanggal_selesai ?? '-' }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">Nomor SK</th>
                <th>:</th>
                <td>{{ $penugasan->nomor_sk ?? '-' }}</td>
            </tr>
            <tr>
                <th style="text-align:right; white-space:nowrap;">File SK</th>
                <th>:</th>
                <td>
                    @if($penugasan->sk_penugasan)
                        <a href="{{ asset('storage/'.$penugasan->sk_penugasan) }}" target="_blank">Lihat SK</a>
                    @else
                        Tidak ada file
                    @endif
                </td>
            </tr>
        </table>
                <div class="fitur">
                      <a href="{{ route('penugasan.edit', $penugasan->id) }}" class="tombol"><b>edit</b></a>
                </div>

        </div>
        @else
            <div class="kotak">
                <p>Data Riwayat Penugasan tidak ditemukan, silakan isi terlebih dahulu.</p>
            </div>
        @endif
</div>
@endsection
