<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PetugasRakController extends Controller
{
    public function index(Request $request)
    {
        $data = Rak::when($request->has('search'), function($q)use($request){
            $q->where('nama_rak', 'like', '%'.$request->query('search').'%')->orWhere('lokasi', 'like', '%'.$request->query('search').'%');
        })->orderBy('id', 'desc')->paginate(10);
        return view('petugas.rak.manage', ['data' => $data]);
    }
    public function createForm()
    {
        return view('petugas.rak.create');
    }
    public function create(Request $request)
    {
        $request->validate([
            'nama_rak' => 'required|min:2|max:200|unique:rak,nama_rak',
            'lokasi' => 'required|max:10',
        ],
        [
            'nama_rak.required' => ':attribute tidak boleh kosong',
            'lokasi.required' => ':attribute tidak boleh kosong',
        ]);

        Rak::create([
            'nama_rak' => ucwords(strtolower($request->nama_rak)),
            'slug' => Str::slug($request->nama_rak),
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->to('/petugas/rak')->with('success', 'Rak berhasil ditambahkan');
    }
    public function editForm($id)
    {
        return view('petugas.rak.edit');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_rak' => 'required|min:2|max:200|unique:rak,nama_rak,'.$id,
            'lokasi' => 'required|max:10',
        ],
        [
            'nama_rak.required' => ':attribute tidak boleh kosong',
            'lokasi.required' => ':attribute tidak boleh kosong',
        ]);

        $rak = Rak::findOrFail($id);
        $rak->update([
            'nama_rak' => ucwords(strtolower($request->nama_rak)),
            'slug' => Str::slug($request->nama_rak),
            'lokasi' => $request->lokasi,
        ]);
        
        // if ($request->hasFile('gambar')) {
        //     $fileName = time().'_'.$request->file('gambar')->getClientOriginalName();
        //     $path = $request->file('gambar')->move(public_path('images/buku'), $fileName);

        //     $rak->gambar = $path;
        //     $rak->save();
        // }
            
        return redirect()->to('/petugas/rak')->with('success', 'Rak berhasil diubah');
    }

    public function destroy($id)
    {
        $rak = Rak::findOrFail($id);
        $rak->delete();
        return back()->with('success', 'Rak berhasil dihapus');
    }
}
