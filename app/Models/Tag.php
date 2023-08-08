<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tag';
    
    protected $fillable = ['nama', 'slug'];

    public $timestamps = false;

    public function buku()
    {
        return $this->belongsToMany(Buku::class);
    }
}
