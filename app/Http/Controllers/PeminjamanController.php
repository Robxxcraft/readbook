<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Auth::guard('anggota')->user()->peminjaman()->latest()->simplePaginate(10);
        $petugas = Petugas::all(['id', 'nama']);
        return view('peminjaman', ['data' => $peminjaman, 'petugas' => $petugas]);
    }
    public function pinjamView($slug)
    {
        $buku = Buku::where('slug', $slug)->first();
        $petugas = Petugas::all(['id', 'nama']);
        return view('pinjamBuku', ['buku' => $buku, 'petugas' => $petugas]);
    }
    public function pinjam(Request $request, $slug)
    {
        $request->validate([
            'kuantitas' => 'required|numeric|max:250',
            'petugas_id' => 'required',
        ],
        [
            'kuantitas.required' => ':attribute tidak boleh kosong',
            'kuantitas.numeric' => ':attribute harus berupa angka',
            'petugas_id.required' => 'Petugas harus dipilih',
        ]);

        $buku = Buku::where('slug', $slug)->first();

        if ($buku->jumlah < 0) {
            throw ValidationException::withMessages(['kuantitas' => 'jumlah sudah habis']);
        }

        if ((int) $buku->jumlah < (int) $request->kuantitas) {
            $kuantitas = $buku->jumlah;
        } else {
            $kuantitas = $request->kuantitas;
        }

        $peminjaman = Peminjaman::create([
            'tanggal_pinjam' => date('Y-m-d'),
            'tanggal_kembali' => date('Y-m-d', strtotime("+7 days")),
            'anggota_id' => Auth::guard('anggota')->user()->id,
            'buku_id' => $buku->id,
            'petugas_id' => $request->petugas_id,
            'kuantitas' => $kuantitas
        ]);

        if ($peminjaman) {
            $buku->update([
                'jumlah' => $buku->jumlah-$kuantitas
            ]);
        }

        return redirect()->to('/buku')->with('success', 'Buku berhasil dipinjam');
    }
}
