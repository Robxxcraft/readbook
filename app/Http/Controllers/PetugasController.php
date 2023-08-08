<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function dashboard(Request $request)
    {
        // $categories = Buku::when($request->has('search'), function($q)use($request){
        //     $q->where('name', 'like', '%'.$request->search.'%')->orWhere('id', (int)$request->search);
        // })->latest()->simplePaginate(10);
        return view('petugas.dashboard');
        
    }

    public function index(Request $request)
    {
        $data = Petugas::when($request->has('search'), function($q)use($request){
            $q->where('nama', 'like', '%'.$request->query('search').'%')->orWhere('email', 'like', '%'.$request->query('search').'%')->orWhere('alamat', 'like', '%'.$request->query('search').'%')->orWhere('telepon', 'like', '%'.$request->query('search').'%');
        })->latest()->paginate(5);
        return view('petugas.data.manage', ['data' => $data]);
    }
    public function createForm()
    {
        return view('petugas.buku.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:2|max:200|unique,judul',
            'email' => 'required|email|unique,email',
            'password' => 'required|min:6',
            'alamat' => 'required|min:5|max:200',
            'telepon' => 'required|integer|digits_between:1,16',
        ],
        [
            'nama.required' => ':attribute tidak boleh kosong',
            'email.required' => ':attribute tidak boleh kosong',
            'password.required' => ':attribute tidak boleh kosong',
            'alamat.required' => ':attribute tidak boleh kosong',
            'telepon.required' => ':attribute tidak boleh kosong',
        ]);

       Petugas::create([
            'nama' => ucwords(strtolower($request->nama)),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        // if ($request->hasFile('gambar')) {
        //     $fileName = time().'_'.$request->file('gambar')->getClientOriginalName();
        //     $request->file('gambar')->move(public_path('images/buku'), $fileName);

        //     $buku->gambar = $fileName;
        //     $buku->save();
        // }

        return redirect()->to('/petugas/data')->with('success', 'Petugas berhasil ditambahkan');
    }

    public function editForm()
    {
        return view('petugas.data.edit');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:2|max:200',
            'email' => 'required|email|unique:petugas,email,'.$id,
            'password' => 'required|min:6',
            'alamat' => 'required|min:5|max:200',
            'telepon' => 'required|integer|digits_between:1,16',
        ],
        [
            'nama.required' => ':attribute tidak boleh kosong',
            'email.required' => ':attribute tidak boleh kosong',
            'password.required' => ':attribute tidak boleh kosong',
            'alamat.required' => ':attribute tidak boleh kosong',
            'telepon.required' => ':attribute tidak boleh kosong',
        ]);

       Petugas::create([
            'nama' => ucwords(strtolower($request->judul)),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        // if ($request->hasFile('gambar')) {
        //     $fileName = time().'_'.$request->file('gambar')->getClientOriginalName();
        //     $request->file('gambar')->move(public_path('images/buku'), $fileName);

        //     $buku->gambar = $fileName;
        //     $buku->save();
        // }

        return redirect()->to('/petugas/data')->with('success', 'Petugas berhasil diubah');
    }
    
    
    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();
        return back()->with('success', 'Petugas berhasil dihapus');
    }
}
