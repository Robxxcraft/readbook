<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Tag;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $data = Buku::with('rak')->when($request->has('cari'), function($q)use($request){
            $q->where('judul', 'like', '%'.$request->cari.'%')->orWhere('pengarang', '%'.$request->cari.'%');
        })->latest()->simplePaginate(8);
        $recent = Buku::latest()->take(3)->get(['judul', 'slug']);
        $tags = Tag::has('buku')->take(10)->get(['nama', 'slug']);
        $cari = $request->cari;
        return view('buku', ['data' => $data, 'recent' => $recent, 'tags' => $tags, 'cari' => $cari]);
    }

    public function detail($slug)
    {
        $buku = Buku::where('slug', $slug)->with(['rak', 'tag'])->first();
        if (!$buku) {
            return redirect()->to('/not-found');
        }
        $related = Buku::whereHas('rak', function($q)use($buku){
            $q->where('nama_rak', $buku->rak->nama_rak);
        })->with('rak')->whereNot('slug', $slug)->latest()->take(4)->get();
        return view('detailBuku', ['buku' => $buku, 'related' => $related]);
    }
}
