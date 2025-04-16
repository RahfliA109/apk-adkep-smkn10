@extends('layout.sidebar')
@section('konten')
<div class="container py-5">
    <h2 class="mb-4">Riwayat Pendidikan</h2>

    @if(session('success')) 
        <div class="alert alert-success">{{ session('success') }}</div> 
    @endif

    <div class="card shadow p-4 rounded">
        <h4>Pendidikan Formal</h4>
        <table class="table">
            <tr><th>Jenjang Pendidikan</th><td>{{ $data->jenjang_pendidikan }}</td></tr>
            <tr><th>Nama Institusi</th><td>{{ $data->nama_institusi }}</td></tr>
            <tr><th>Jurusan</th><td>{{ $data->jurusan ?? '-' }}</td></tr>
            <tr><th>Tahun Lulus</th><td>{{ $data->tahun_lulus }}</td></tr>
            <tr><th>Ijazah</th>
                <td>
                    @if($data->ijazah)
                        <a href="{{ asset('storage/' . $data->ijazah) }}" target="_blank">Lihat Ijazah</a>
                    @else
                        Tidak ada file
                    @endif
                </td>
            </tr>
        </table>

        <hr>

        <h4>Pendidikan Non-Formal</h4>
        <table class="table">
            <tr><th>Nama Pelatihan</th><td>{{ $data->nama_pelatihan ?? '-' }}</td></tr>
            <tr><th>Penyelenggara</th><td>{{ $data->penyelenggara_pelatihan ?? '-' }}</td></tr>
            <tr><th>Tahun Pelatihan</th><td>{{ $data->tahun_pelatihan ?? '-' }}</td></tr>
            <tr><th>Sertifikat Pelatihan</th>
                <td>
                    @if($data->sertifikat_pelatihan)
                        <a href="{{ asset('storage/' . $data->sertifikat_pelatihan) }}" target="_blank">Lihat Sertifikat</a>
                    @else
                        Tidak ada file
                    @endif
                </td>
            </tr>
        </table>

        <div class="mt-4">
        <a href="{{ route('riwayatPendidikan.edit', $data->id) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('riwayatPendidikan.destroy', $data->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE') <!-- Menyimulasikan method DELETE -->
    
    <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</button>
</form>

        </div>
    </div>
</div>
@endsection
