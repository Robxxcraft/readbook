<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class PencarianController extends Controller
{
    public function index(Request $request){
        $pencarian = Buku::where('judul', '%'.$request->cari.'%')->orWhere('tahun_terbit', '%'.$request->cari.'%')->orWhere('pengarang', '%'.$request->cari.'%')
        ->orWhere('rak.nama_rak', '%'.$request->cari.'%')->orWhere('rak.lokasi', '%'.$request->cari.'%')->get();
        return view('pencarian', ['data' => $pencarian]);
    }
}
