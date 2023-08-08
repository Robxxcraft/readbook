@extends('layouts.admin')

@section('title')
    Kelola Buku - Readbook    
@endsection

@section('content')
    <div class="p-4 mx-3">
        <div class="fs-5 fw-bold mb-3 text-primary">Kelola Buku</div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mb-4 d-flex align-items-end justify-content-between">
            <a href="/petugas/buku/tambah" class="link">
                <div class="bg-primary rounded d-inline-block text-white px-2 me-2">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <span class="text-secondary fw-semibold pb-1">Tambah buku</span>
            </a>
            <form action="/petugas/buku" method="get">
                <div class="position-relative">
                    @csrf
                    <input name="search" type="text" placeholder="Cari..." class="form-control bg-white pe-5">
                    <a type="submit" class="position-absolute end-0 top-0 btn btn-primary shadow"><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
            </form>
        </div>
        <div style="display: grid; grid-template-columns: repeat(4, minmax(0, 4fr)); gap: 2rem;">
            @foreach ($data as $buku)
                <div class="bg-white p-3 rounded-sm">
                    <div class="w-100" style="height: 220px;">
                        <img class="img-fluid h-100" style="object-fit: cover" src="{{asset('images/buku/'.$buku->gambar)}}" alt="">
                    </div>
                    <div class="fw-semibold mt-3 text-secondary" style="font-size: 0.78rem"><i class="fa-solid fa-clock me-1"></i> {{$buku->created_at->translatedFormat('d M Y')}}</div>
                    <a href="/petugas/buku/ubah/{{$buku->id}}" class="fw-semibold title">{{$buku->judul}} <i class="fa-solid fa-pencil"></i> </a>
                    <div class="text-secondary">{{$buku->pengarang}}</div>
                    <div class="my-2 d-flex align-items-center justify-content-center">
                        <div class="badge bg-primary me-2">{{$buku->rak->nama_rak}}</div>
                        <span class="text-secondary">|</span>
                        <div class="ms-2 text-primary fw-semibold">{{$buku->jumlah}}</div>
                    </div>
                    <div class="text-secondary d-flex justify-content-center" style="font-size: 0.78rem">Tahun Terbit <span class="ps-2 fw-semibold">{{$buku->tahun_terbit->translatedFormat('d M Y')}}</span></div>
                    <a type="button" href="/petugas/buku/hapus/{{$buku->id}}" class="bg-primary rounded text-white px-2 py-1"><i class="fa-solid fa-trash"></i></a>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-end">
            {!! $data->links() !!}
        </div>
    </div>
@endsection