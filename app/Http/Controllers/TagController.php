<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Tag;

class TagController extends Controller
{
    public function index($slug) {
        $data = Buku::with('rak')->whereHas('tag', function($q)use($slug){
            $q->where('slug', $slug);
        })->latest()->simplePaginate(8);
        $recent = Buku::latest()->take(3)->get(['judul', 'slug']);
        $tags = Tag::has('buku')->take(10)->get(['nama', 'slug']);
        $namaTag = str_replace('-', ' ', $slug);
        return view('tag', ['data' => $data, 'recent' => $recent, 'tags' => $tags, 'namaTag' => $namaTag]);
    }
}
