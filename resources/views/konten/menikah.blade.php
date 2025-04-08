@extends('sidebar.sidebar')
<link rel="stylesheet" href="css/form-input.css">

@section('konten')
    <div class="container mx-auto py-8">
    <h2>Riwayat Menikah</h2>
      <form id="riwayatMenikahForm">
        <div class="form-group">
          <label>Status Perkawinan</label>
          <select name="status_perkawinan" required>
            <option value="Kawin">Kawin</option>
            <option value="Belum Kawin">Belum Kawin</option>
            <option value="Duda">Duda</option>
            <option value="Janda">Janda</option>
          </select>
        </div>
        <div class="form-group">
          <label>Tanggal Menikah/Cerai</label>
          <input type="date" name="tanggal_menikah_cerai">
        </div>
        <div class="form-group">
          <label>Nama Suami/Istri</label>
          <input type="text" name="nama_pasangan">
        </div>
        <div class="form-group">
          <label>Pekerjaan Pasangan</label>
          <input type="text" name="pekerjaan_pasangan">
        </div>
        <div class="form-group">
          <label>Jumlah Anak</label>
          <input type="number" name="jumlah_anak" min="0">
        </div>
        <div class="form-group">
          <label>Upload Akta Nikah/Cerai (PDF/JPG)</label>
          <input type="file" name="akta_nikah">
        </div>

        <button type="submit">Simpan Riwayat Menikah</button>
      </form>
    </div>
@endsection
