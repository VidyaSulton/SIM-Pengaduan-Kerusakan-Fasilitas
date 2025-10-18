<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';

     protected $fillable = [
        'no_tiket',
        'nama_pelapor',
        'email_pelapor',
        'kontak',
        'nama_barang',
        'deskripsi',
        'lokasi',
        'foto',
        'tingkat_urgensi',
        'status',
        'tgl_lapor',
        'tgl_diproses',
        'tgl_selesai',
        'catatan_teknisi',
        'id_admin',
        'id_teknisi',
    ];

    protected $casts = [
        'tgl_lapor' => 'datetime',
        'tg;_diproses' => 'datetime',
        'tgl_selesai' => 'datetime',
    ];

    // Relasi ke User sebagai Admin
    public function admin(){
        return $this->belongsTo(User::class, 'id_admin', 'id');

    }

    // Relasi ke User sebagai Teknisi
    public function teknisi()
    {
        return $this->belongsTo(User::class, 'id_teknisi', 'id');
    }

    // Relasi ke RiwayatLaporan
     public function riwayat()
    {
        return $this->hasMany(RiwayatLaporan::class, 'id_laporan', 'id_laporan');
    }
}
