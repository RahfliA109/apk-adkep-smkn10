@extends('layout.sidebar')

@section('konten')
    <div class="container mx-auto py-8">
        <h2>Riwayat Penugasan</h2>
        
        <a href="{{ route('penugasan.create') }}">Tambah Riwayat Penugasan</a>
        
        <table>
            <thead>
                <tr>
                    <th>Nama Sekolah</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Periode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $penugasan)
                    <tr>
                        <td>{{ $penugasan->nama_sekolah }}</td>
                        <td>{{ $penugasan->jabatan }}</td>
                        <td>{{ $penugasan->status_penugasan }}</td>
                        <td>{{ $penugasan->tanggal_mulai }} - {{ $penugasan->tanggal_selesai }}</td>
                        <td>
                            <a href="{{ route('penugasan.edit', $penugasan->id) }}">Edit</a>
                            <form action="{{ route('penugasan.delete', $penugasan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
