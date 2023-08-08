<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Rak;
use App\Models\Tag;

class RakController extends Controller
{
    public function index()
    {
        $rak = Rak::has('buku')->orderBy('nama_rak', 'asc')->simplePaginate(12);
        $recent = Buku::latest()->take(3)->get(['judul', 'slug']);
        $tags = Tag::has('buku')->take(10)->get(['nama', 'slug']);
        return view('rak', ['rak' => $rak, 'recent' => $recent, 'tags' => $tags]);
    }
    
    public function bukuDiRak($slug)
    {
        $namaRak = str_replace('-', ' ', $slug);
        $data = Buku::with('rak')->whereHas('rak', function($q)use($slug){ $q->where('slug', $slug); })->orderBy('updated_at', 'desc')->simplePaginate(10);
        $recent = Buku::latest()->take(3)->get(['judul', 'slug']);
        $tags = Tag::has('buku')->take(10)->get(['nama', 'slug']);
        return view('bukuDiRak', ['data' => $data, 'namaRak' => $namaRak, 'recent' => $recent, 'tags' => $tags]);
    }
}
