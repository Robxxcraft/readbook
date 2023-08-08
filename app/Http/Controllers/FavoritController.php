<?php

namespace App\Http\Controllers;

use App\Http\Resources\FavoritedResource;
use App\Models\Favorit;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;

class FavoritController extends Controller
{
    public function index(){
        $favorit = Buku::whereHas('favorit', function($q){ $q->where('user_id', Auth::user()->id); })->with('category')->latest()->simplePaginate(12);
        return view('favorite', ['favorit' => $favorit]);
    }

    public function tambah($id){
        Buku::firstOrCreate([
            'anggota_id' => Auth::user()->id,
            'buku_id' => $id,
        ]);
    }

    public function hapus($id){
        $favorit = Buku::where('anggota_id', Auth::user()->id)->where('buku_id', $id);
        $favorit->delete();
    }
}
