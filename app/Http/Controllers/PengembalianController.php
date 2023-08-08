<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PengembalianController extends Controller
{
    
    public function index()
    {
        $pengembalian = Auth::guard('anggota')->user()->pengembalian()->latest()->simplePaginate(10);
        return view('pengembalian', ['data' => $pengembalian]);
    }

    public function kembalikan(Request $request, $id)
    {
        $request->validate([
            'petugas_id' => 'required',
        ],
        [
            'petugas_id.required' => 'Petugas harus dipilih',
        ]);

        $peminjaman = Peminjaman::find($id);

        if (!$peminjaman) {
            throw ValidationException::withMessages(['Data tidak ditemukan']);
        }

        $denda = 0;
        if ($peminjaman->tanggal_pinjam > $peminjaman->tanggal_kembali) {
            $denda += 5000;
        }
        $pengembalian = Pengembalian::create([
            'tanggal_pengembalian' => date('Y-m-d'),
            'denda' => $denda,
            'peminjaman_id' => $peminjaman->id,
        ]);

        if ($pengembalian) {
            $peminjaman->delete();
        }

        return redirect()->to('/pengembalian')->with('success', 'Buku berhasil dikembalikan');
    }
}
