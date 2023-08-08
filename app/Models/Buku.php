<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    
    protected $fillable = ['judul', 'slug', 'gambar', 'tahun_terbit', 'jumlah', 'pengarang', 'rak_id'];

    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }

    protected $casts = [
        'tahun_terbit' => 'date:Y-f-d',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
