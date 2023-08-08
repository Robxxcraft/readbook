<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    
    protected $fillable = ['tanggal_pinjam', 'tanggal_kembali', 'anggota_id', 'buku_id', 'petugas_id', 'kuantitas'];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    protected $casts = [
        'tanggal_pinjam' => 'datetime',
        'tanggal_kembali' => 'datetime',
    ];
}
