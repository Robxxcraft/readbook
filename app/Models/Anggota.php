<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

// use Laravel\Sanctum\HasApiTokens;

class Anggota extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'anggota';

    protected $guard = 'anggota';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'alamat',
        'telepon',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class)->with(['buku', 'petugas']);
    }

    public function pengembalian(){
        return $this->hasMany(Pengembalian::class)->with('buku', 'petugas');
    }
}
