<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttemps = 3;
    protected $decayMinutes = 2;

    public function __construct()
    {
        $this->middleware('guest:anggota')->except('logout');
        $this->middleware('guest:petugas')->except('logout');
    }

    public function daftarAnggotaForm()
    {
        return view('auth.daftar');
    }

    public function daftarAnggota(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:50',
        ],
        [
            'nama.required' => ':attribute tidak boleh kosong',
            'nama.min' => ':attribute min 2 karakter',
            'nama.max' => ':attribute min 50 karakter',
            'email.required' => ':attribute tidak boleh kosong',
            'email.email' => 'masukan :attribute dengan benar',
            'password.required' => ':attribute tidak boleh kosong',
            'password.min' => ':attribute min 6 karakter',
            'password.max' => ':attribute max 50 karakter',
        ]);

        Anggota::create([
            'nama' => strtolower(ucwords($request->nama)),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->to('/masuk')->with('registered', 'Account registered successfully');
    }

    public function masukForm()
    {
        return view('auth.masuk');
    }
    public function masuk(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:50',
            'role' => 'required',
        ], 
        [
            'email.required' => ':attribute tidak boleh kosong',
            'email.email' => 'masukan :attribute dengan benar',
            'password.required' => ':attribute tidak boleh kosong',
            'password.min' => ':attribute min 6 karakter',
            'password.max' => ':attribute max 50 karakter',
        ]);

        $credentials = $request->only(['email', 'password']);
        
        if($request->role == 1){
            if (Auth::guard('petugas')->attempt($credentials)) {
                $request->session()->regenerate();
                $this->clearLoginAttempts($request);
                return redirect()->to('/petugas/dashboard');
            } else {
                return back()->withErrors(['email' => 'Data petugas yang dimasukan tidak benar.']);
            }
        } else {
            if (Auth::guard('anggota')->attempt($credentials)) {
                $request->session()->regenerate();
                $this->clearLoginAttempts($request);
                return redirect()->to('/buku');
            } else {
                return back()->withErrors(['email' => 'Data anggota yang dimasukan tidak benar.']);
            }
        }
    }

    public function logout()
    {
        $anggota = Auth::guard('anggota');
        $petugas = Auth::guard('petugas');
        if ($petugas) {
           $petugas->logout();
        } else {
            $anggota->logout();
        }
        Session::flush();
        return redirect()->to('/');
    }
}
