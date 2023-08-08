@extends('layouts.app')

@section('title')
    Pinjam {{$buku->judul}} - Readbook
@endsection

@section('content')
    
<div class="mx-5 mt-3">
    <div class="bg-white rounded p-4">
        <div class="row">
            <div class="col-8">
                <div class="text-primary fw-bold fs-5 mb-3">Pinjam Buku</div>
                <div class="row">
                    <div class="col-3">
                        <div class="ms-3">
                            @if (isset($buku->gambar))
                                <img src="{{asset('images/buku/'.$buku->gambar)}}" class="img-fluid rounded-1 shadow-sm w-100" style="object-fit: cover;" alt="{{$buku->judul}}">
                            @endif
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="pe-5 ps-3 py-2">
                            <div class="text-secondary border-primary my-2 ps-2 rounded-1 border-start border-4 border-primary">Kategori : <div class="badge bg-primary">{{$buku->rak->nama_rak}}</div></div>
                            <div class="text-secondary border-primary my-2 ps-2 rounded-1 border-start border-4 border-primary">Judul : <span class="text-primary fw-semibold">{{$buku->judul}}</span></div>
                            <div class="text-secondary border-primary my-2 ps-2 rounded-1 border-start border-4 border-primary">Pengarang : <span class="text-primary fw-semibold">{{$buku->pengarang}}</span></div>
                            <div class="text-secondary border-primary my-2 ps-2 rounded-1 border-start border-4 border-primary">Jumlah Tersedia : <span class="text-primary fw-semibold">{{$buku->jumlah}}</span></div>
                            <div class="text-secondary border-primary my-2 ps-2 rounded-1 border-start border-4 border-primary">Tahun Terbit : <span class="text-primary fw-semibold">{{$buku->tahun_terbit->translatedFormat('D, d M Y')}}</span></div>
                            <div class="text-secondary border-primary my-2 ps-2 rounded-1 border-start border-4 border-primary">Ditambahkan pada : <span class="text-primary fw-semibold">{{$buku->created_at->translatedFormat('D, d M Y')}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 d-flex flex-column justify-content-end">
                <form action="/buku/{{$buku->slug}}/pinjam" method="POST">
                    @csrf
                    <div class="position-relative pb-3 mb-3">
                        <div class="fw-semibold mb-1">* Kuantitas</div>
                        <div class="d-flex align-items-center">
                            <input type="number" id="kuantitas" name="kuantitas" class="form-control {{ $errors->has('kuantitas') ? 'is-invalid' : ''}}" style="width: 8rem;" value="1">
                            <div id="decrement" onclick="decrement()" class="ms-3 py-1 px-3 btn btn-outline-danger">-</div>
                            <div id="increment" onclick="increment()" class="ms-1 py-1 px-3 btn btn-outline-danger">+</div>
                        </div>
                        @error('kuantitas')
                            <div class="position-absolute text-danger bottom-0 ps-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="position-relative pb-3 mb-3">
                        <div class="fw-semibold mb-1">* Petugas</div>
                        <select name="petugas_id" id="petugas_id" class="form-select mb-1 {{ $errors->has('petugas_id') ? 'is-invalid' : ''}}">
                            <option selected disabled value="">Pilih Petugas</option>
                            @foreach ($petugas as $ptgs)
                                <option value="{{$ptgs->id}}">{{$ptgs->nama}}</option>
                            @endforeach
                        </select>
                        @error('petugas_id')
                            <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="pb-3 mb-3">
                        <div class="fw-semibold mb-1">* Tanggal Pengembalian</div>
                        {{-- <div class="fw-semibold text-primary">{{now()->translatedFormat('F, d M Y')}}</div> --}}
                        <input type="date" class="form-control">
                        @error('tanggal_kembali')
                            <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        
                        <button type="submit" @disabled($buku->jumlah == 0) class="btn btn-primary fw-semibold">Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function increment(){
        const input = document.getElementById('kuantitas')
        if (input.value < 250) {
            input.value++
        }
    }
    function decrement(){
        const input = document.getElementById('kuantitas')
        if (input.value > 1) {
            input.value--
        }
    }
</script>
@endsection