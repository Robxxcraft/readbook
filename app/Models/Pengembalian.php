<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';

    protected $fillable = ['tanggal_pinjam', 'tanggal_kembali', 'tanggal_dikembalikan', 'anggota_id', 'buku_id', 'petugas_id', 'kuantitas', 'denda', 'peminjaman_id', 'petugas_id'];

    protected $casts = [
        'tanggal_pinjam' => 'datetime',
        'tanggal_kembali' => 'datetime',
        'tanggal_dikembalikan' => 'datetime',
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}
