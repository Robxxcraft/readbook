@extends('layouts.app')

@section('title')
    {{$buku->judul}} - Readbook
@endsection

@section('content')
    
<div class="mx-5 mt-3">
    <div class="bg-white rounded">
        <div class="row">
            <div class="col-4">
                <div class="ms-3 px-5 py-4">
                    @if (isset($buku->gambar))
                        <img src="{{asset('images/buku/'.$buku->gambar)}}" class="img-fluid rounded-1 shadow-sm w-100" style="height: 280px; object-fit: cover;" alt="">
                    @endif
                </div>
            </div>
            <div class="col-8">
                <div class="pe-5 ps-3 py-4">
                    <div class="mb-2 badge bg-primary">{{$buku->rak->nama_rak}}</div>
                    <div class="fw-semibold fs-5 mb-1">{{$buku->judul}}</div>
                    <div class="text-secondary fw-semibold">{{$buku->pengarang}}</div>
                    <div class="row align-items-end mt-5">
                        <div class="col-4 border-start">
                            <div class="text-secondary">Jumlah</div>
                            <div class="text-primary fw-semibold">{{$buku->jumlah}}</div>
                        </div>
                        <div class="col-4 border-start border-end">
                            <div class="text-secondary">Tahun Terbit</div>
                            <div class="text-primary fw-semibold">{{$buku->tahun_terbit->translatedFormat('D, d M Y')}}</div>
                        </div>
                        <div class="col-4">
                            <div class="text-secondary">Ditambahkan pada</div>
                            <div class="text-primary fw-semibold">{{$buku->created_at->translatedFormat('D, d M Y')}}</div>
                        </div>
                    </div>
                    <div class="fw-semibold texy-secondary mt-3">Tags</div>
                    <div id="tags" class="d-flex flex-wrap align-items-start mt-1">
                        @foreach ($buku->tag as $tag)
                            <a href="/tag/{{$tag->slug}}" class="bg-primary rounded-1 shadow-sm fw-semibold text-white px-2 py-1 me-2 mb-2"><i class="fa-solid fa-tag"></i> {{strtolower($tag->nama)}}</a>
                        @endforeach
                    </div>
                    <div class="border-bottom pb-3 mt-5 d-flex justify-content-end">
                        <a href="/buku/{{$buku->slug}}/pinjam" class="btn btn-primary rounded-1">
                            <div class="fw-semibold shadow-sm">Pinjam</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @if (count($related))
        <div class="mt-4 ms-3 fs-5 fw-bold text-primary">Related</div>
        <div class="row">
            @foreach ($related as $buku)
                <div class="col-3 p-0">
                    <div class="p-3">
                    <div class="w-100 bg-secondary shadow rounded-1 overflow-hidden" style="height: 200px;">
                        @if (isset($buku->gambar))
                            <img class="img-fluid h-100 w-100" style="object-fit: cover" src="{{asset('images/buku/'.$buku->gambar)}}" alt="">
                        @endif
                    </div>
                    <div class="fw-semibold mt-3 text-secondary" style="font-size: 0.78rem"><i class="fa-solid fa-clock me-1"></i> {{$buku->created_at->translatedFormat('d M Y')}}</div>
                    <a href="/buku/{{$buku->slug}}" class="mt-2 fw-semibold link">{{$buku->judul}}</a>
                    <div class="text-secondary mb-1">{{$buku->pengarang}}</div>
                    <div class="badge bg-primary mt-2 mb-4 px-2 py-1">{{$buku->rak->nama_rak}}</div>
                    <a href="/buku/{{$buku->slug}}/pinjam" class="mt-1 btn btn-primary rounded-1 w-100 py-1 fw-semibold"><i class="me-1 fa-solid fa-calendar-plus"></i> Pinjam</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection