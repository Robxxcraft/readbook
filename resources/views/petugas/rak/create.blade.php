@extends('layouts.admin')

@section('title')
    Kelola Buku - Readbook    
@endsection

@section('content')
<div class="mt-3 card w-50 mx-auto border-0 shadow-sm">
    <div class="card-body">
        <div class="ps-3 fw-bold text-primary fs-5">Tambah Rak</div>
        <form action="/petugas/rak/tambah" method="POST" class="p-3">
            @csrf
            <div class="pb-3 position-relative">
                <label for="nama_rak" class="form-label">Nama Rak</label>
                <input type="text" name="nama_rak" id="nama_rak" class="form-control mb-1 {{ $errors->has('nama_rak') ? 'is-invalid' : ''}}" placeholder="Isi kode rak disini..." aria-label="nama_rak" autocomplete="false" value="{{old('nama_rak')}}">
                @error('nama_rak')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div class="pb-3 position-relative">
                <label for="lokasi" class="form-label">Lokasi</label>
                <textarea name="lokasi" id="lokasi" class="form-control mb-1 {{ $errors->has('lokasi') ? 'is-invalid' : ''}}" placeholder="Isi lokasi disini..." aria-label="lokasi" value="{{old('lokasi')}}"></textarea>
                @error('lokasi')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div class="mt-2 d-flex justify-content-end">
                <a href="/petugas/buku" type="button" class="btn btn-outline-secondary fw-semibold me-3">Kembali</a>
                <button type="submit" class="btn btn-primary fw-semibold">Tambah</button>
            </div>
        </form>
    </div>
</div>
@endsection