@extends('layouts.app')

@section('title')
    List Pengembalian - Readbook
@endsection

@section('content')
    <div class="p-3">
        <div class="fs-5 fw-bold ms-3 container-fluid">
            <span class="text-primary">List Pengembalian</span>
            @if (request()->page > 1)
                <span class="text-gray"> - Page 
                {{ request()->page }}
                </span>
            @endif
        </div>
        @foreach ($data as $pengembalian)
            <div class="mt-3 bg-white rounded m-4 shadow-sm">
                <div class="d-flex align-items-start">
                    <div style="flex-basis: 15%" class="bg-secondary shadow rounded-1 overflow-hidden">
                        @if (isset($pengembalian->buku->gambar))
                            <img class="img-fluid h-100 w-100" style="object-fit: cover" src="{{asset('images/buku/'.$pengembalian->buku->gambar)}}" alt="">
                        @endif
                    </div>
                    <div class="p-3 d-flex align-items-start position-relative" style="flex-basis: 85%">
                        <div class="d-block">
                            <div class="text-primary fs-5 fw-bold mb-2">#{{$pengembalian->id}}</div>
                            <div class="d-flex fw-semibold w-100">
                                <div class="basis-5/12 text-center">
                                    <div class="text-gray border-bottom">Tanggal Pinjam</div>
                                    <div class="text-primary">{{$pengembalian->tanggal_pinjam->translatedFormat('d M Y')}}</div>
                                </div>
                                <div class="basis-2/12 mx-2 text-center">
                                    <div class="text-secondary"><i class="fa-solid fa-arrow-right"></i></div>
                                    <div class="text-primary"><i class="fa-solid fa-arrow-right"></i></div>
                                </div>
                                <div class="basis-5/12 text-center">
                                    <div class="text-gray border-bottom">Tanggal Kembali</div>
                                    <div class="text-primary">{{$pengembalian->tanggal_kembali->translatedFormat('d M Y')}}</div>
                                </div>
                            </div>
                            <div class="fw-semibold mt-3">{{$pengembalian->buku->judul}}</div>
                            <div class="text-secondary">{{$pengembalian->buku->pengarang}}</div>
                            <div class="mt-1">
                                <div class="badge bg-primary mt-2 mb-4 me-1 px-2 py-1">{{$pengembalian->buku->rak->nama_rak}}</div>
                                <div class="badge bg-secondary mt-2 mb-4 px-2 py-1">{{$pengembalian->buku->rak->lokasi}}</div>
                            </div>
                        </div>
                        <div class="end-0 top-0 me-3 mb-1 position-absolute text-end">
                            <div>checklist</div>
                        </div>
                        <div class="end-0 bottom-0 me-3 mb-1 position-absolute text-end">
                            <div class="ms-5 mb-3 d-flex fw-semibold">
                                <div>Jumlah</div>
                                <div class="mx-2">:</div>
                                <div class="text-primary">{{$pengembalian->kuantitas}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        @endforeach
        <div class="me-4 d-flex justify-content-end">{!! $data->links() !!}</div>
    </div>
@endsection