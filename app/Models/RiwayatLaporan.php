<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatLaporan extends Model
{
    protected $table = 'riwayat_laporan';
    protected $primaryKey = 'id_laporan';
    public $timestamps = false;


    protected $fillable = [
        'id_laporan',
        'status',
        'catatan',
        'diubah_oleh',
        'diubah_pada',
    ];

     protected $casts = [
        'diubah_pada' => 'datetime',
    ];
    // Relasi ke Laporan 
     public function laporan(){
        return $this->belongsTo(Laporan::class, 'id_laporan', 'id_laporan');
     }
     // Relasi ke User yang mengubah status
      public function user()
    {
        return $this->belongsTo(User::class, 'diubah_oleh', 'id');
    }
}
