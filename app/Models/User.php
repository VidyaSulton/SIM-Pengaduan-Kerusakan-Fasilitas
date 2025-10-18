<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PDO;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi ke Laporan sebagai Admin
    public function laporanSebagaiAdmin(){
        return $this->hasMany(Laporan::class, 'id_admin', 'id');
    }
    // Relasi ke Laporan sebagai Teknisi
    public function laporanSebagaiTeknisi(){
        return $this->hasMany(Laporan::class, 'id_teknisi', 'id');
    }

    // Cek apakah user adalah Admin
    public function isAdmin(){
        return $this->role === 'admin';
    }

    // Cek apakah user adalah Teknisi
    public function isTeknisi(){
        return $this->role === 'teknisi';
    }
}
