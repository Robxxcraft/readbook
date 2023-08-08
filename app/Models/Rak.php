<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;

    protected $table = 'rak';
    
    public $timestamps = false;

    protected $fillable = ['nama_rak', 'slug', 'lokasi'];

    public function buku(){
        return $this->hasMany(Buku::class);
    }
}
