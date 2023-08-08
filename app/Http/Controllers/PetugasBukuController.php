<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Rak;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PetugasBukuController extends Controller
{
    public function index(Request $request)
    {
        $data = Buku::with('rak')->when($request->has('search'), function($q)use($request){
            $q->where('judul', 'like', '%'.$request->query('search').'%')->orWhere('tahun_terbit', 'like', '%'.$request->query('search').'%')->orWhere('jumlah', 'like', '%'.$request->query('search').'%')->orWhere('pengarang', 'like', '%'.$request->query('search').'%');
        })->latest()->paginate(8);
        return view('petugas.buku.manage', ['data' => $data]);
    }
    public function createForm()
    {
        $rak = Rak::all();
        return view('petugas.buku.create', ['rak' => $rak]);
    }
    public function create(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:2|max:200|unique:buku,judul',
            'tahun_terbit' => 'required|date',
            'jumlah' => 'required|integer|min:6|digits_between:1,3',
            'pengarang' => 'required|min:2|max:120',
            'rak_id' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,webp',
        ],
        [
            'judul.required' => ':attribute tidak boleh kosong',
            'tahun_terbit.required' => ':attribute tidak boleh kosong',
            'jumlah.required' => ':attribute tidak boleh kosong',
            'jumlah.digits_between' => ':attribute tidak bisa melebihi 3 digit',
            'pengarang.required' => ':attribute tidak boleh kosong',
            'rak_id.required' => 'Rak tidak boleh kosong',
        ]);

        $buku = Buku::create([
            'judul' => ucwords(strtolower($request->judul)),
            'slug' => Str::slug($request->judul),
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah' => $request->jumlah,
            'pengarang' => $request->pengarang,
            'rak_id' => $request->rak_id,
            'gambar' => 'null'
        ]);
        
        if ($request->hasFile('gambar')) {
            $fileName = time().'_'.$request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images/buku'), $fileName);

            $buku->gambar = $fileName;
            $buku->save();
        }

        if ($request->has('tags')) {
            $tags = explode(',', $request->tags);
            foreach($tags as $tag){
                $tag = Tag::firstOrCreate([
                    'nama' => strtolower($tag),
                    'slug' => Str::slug($tag)
                ]);

                $buku->tag()->attach($tag->id);
            }
        }

        return redirect()->to('/petugas/buku')->with('success', 'Buku berhasil ditambahkan');
    }

    public function editForm($id)
    {
        $buku = Buku::with('tag')->findOrFail($id);
        $rak = Rak::all();
        return view('petugas.buku.edit', ['buku' => $buku, 'rak' => $rak]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|min:2|max:200|unique:buku,judul,'.$id,
            'tahun_terbit' => 'required|date',
            'jumlah' => 'required|integer|min:6|digits_between:1,3',
            'pengarang' => 'required|min:2|max:120',
            'rak_id' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,webp',
        ],
        [
            'judul.required' => ':attribute tidak boleh kosong',
            'tahun_terbit.required' => ':attribute tidak boleh kosong',
            'jumlah.required' => ':attribute tidak boleh kosong',
            'jumlah.digits_between' => ':attribute tidak bisa melebihi 3 digit',
            'pengarang.required' => ':attribute tidak boleh kosong',
            'rak_id.required' => 'Rak tidak boleh kosong',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update([
            'judul' => ucwords(strtolower($request->judul)),
            'slug' => Str::slug($request->judul),
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah' => $request->jumlah,
            'pengarang' => $request->pengarang,
            'rak_id' => $request->rak_id
        ]);
        
        if ($request->hasFile('gambar')) {
            $fileName = time().'_'.$request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images/buku'), $fileName);

            $buku->gambar = $fileName;
            $buku->update();
        }

        if ($request->has('tags')) {
            $buku->tag()->detach();
            $tags = explode(',', $request->tags);
            foreach($tags as $tag){
                $tag = Tag::firstOrCreate([
                    'nama' => strtolower($tag),
                    'slug' => Str::slug($tag)
                ]);

                $buku->tag()->attach($tag->id);
            }
        }

        return redirect()->to('/petugas/buku')->with('success', 'Buku berhasil diubah');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return back()->with('success', 'Buku berhasil dihapus');
    }
}
