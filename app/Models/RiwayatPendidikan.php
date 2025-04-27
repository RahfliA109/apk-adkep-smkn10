<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    protected $table = 'riwayat_pendidikan'; // Pastikan nama tabel sesuai

    protected $fillable = [
        'user_id',
        'jenjang_pendidikan',
        'nama_institusi',
        'jurusan',
        'tahun_lulus',
        'nama_pelatihan',
        'penyelenggara_pelatihan',
        'tahun_pelatihan',
        'ijazah',
        'sertifikat_pelatihan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
