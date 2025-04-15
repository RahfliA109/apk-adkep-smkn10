@extends('sidebar.sidebar')
<link rel="stylesheet" href="css/form-input.css">
<title>biodata</title>

@section('konten')
    <div class="container mx-auto py-8">
    <h2>Riwayat Pendidikan</h2>
<form action="#" id="riwayatPendidikanForm">
  <!-- Pendidikan Formal -->
   
  <div class="form-group">
    <label>Jenjang Pendidikan</label>
    <select name="jenjang_pendidikan" required>
      <option value="SD">SD</option>
      <option value="SMP">SMP</option>
      <option value="SMA/SMK">SMA/SMK</option>
      <option value="D3">D3</option>
      <option value="S1/D4">S1/D4</option>
      <option value="S2">S2</option>
      <option value="S3">S3</option>
    </select>
  </div>
  <div class="form-group">
    <label>Nama Institusi</label>
    <input type="text" name="nama_institusi" required>
  </div>
  <div class="form-group">
    <label>Jurusan</label>
    <input type="text" name="jurusan">
  </div>
  <div class="form-group">
    <label>Tahun Lulus</label>
    <input type="number" name="tahun_lulus" min="1900" max="2099" required>
  </div>

  <!-- Pendidikan Non-Formal -->
  <div class="form-group">
    <label>Nama Pelatihan/Sertifikasi</label>
    <input type="text" name="nama_pelatihan">
  </div>
  <div class="form-group">
    <label>Penyelenggara</label>
    <input type="text" name="penyelenggara_pelatihan">
  </div>
  <div class="form-group">
    <label>Tahun Pelatihan</label>
    <input type="number" name="tahun_pelatihan" min="1900" max="2099">
  </div>

  <!-- Dokumen -->
  <div class="form-group">
    <label>Upload Ijazah (PDF/JPG)</label>
    <input type="file" name="ijazah">
  </div>
  <div class="form-group">
    <label>Upload Sertifikat Pelatihan (Opsional)</label>
    <input type="file" name="sertifikat_pelatihan">
  </div>

  <button type="submit">Simpan Riwayat Pendidikan</button>
</form>
    </div>
@endsection
