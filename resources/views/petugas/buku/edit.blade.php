@extends('layouts.admin')

@section('title')
    Edit Buku - Readbook    
@endsection

@section('content')
<div class="my-4 card w-50 mx-auto border-0 shadow-sm">
    <div class="card-body">
        <div class="ps-3 fw-bold text-primary fs-5">Edit Buku</div>
        <form action="/petugas/buku/ubah/{{$buku->id}}" method="POST" class="p-3" enctype="multipart/form-data">
            @csrf
            <div class="pb-3 position-relative">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control mb-1 {{ $errors->has('judul') ? 'is-invalid' : ''}}" placeholder="Enter judul here..." aria-label="judul" autocomplete="false" value="{{$buku->judul}}">
                @error('judul')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div class="pb-3 position-relative">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                {{date($buku->tahun_terbit)}}
                <input type="date" name="tahun_terbit" id="tahun_terbit" class="form-control mb-1 {{ $errors->has('tahun_terbit') ? 'is-invalid' : ''}}" placeholder="Enter tahun_terbit here..." aria-label="tahun_terbit" value="{{$buku->tahun_terbit}}">
                @error('tahun_terbit')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div class="pb-3 position-relative">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control mb-1 {{ $errors->has('jumlah') ? 'is-invalid' : ''}}" placeholder="Enter jumlah here..." aria-label="jumlah" value="{{$buku->jumlah}}">
                @error('jumlah')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div class="pb-3 position-relative">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input type="text" name="pengarang" id="pengarang" class="form-control mb-1 {{ $errors->has('pengarang') ? 'is-invalid' : ''}}" placeholder="Enter pengarang here..." aria-label="pengarang" value="{{$buku->pengarang}}">
                @error('pengarang')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div class="pb-3 position-relative">
                <label for="rak" class="form-label">Rak</label>
                <select name="rak_id" id="rak_id" class="form-select mb-1 {{ $errors->has('rak_id') ? 'is-invalid' : ''}}">
                    <option selected value="">Choose...</option>
                    @foreach ($rak as $perRak)
                        @if ($buku->rak->id == $perRak->id)
                            <option value="{{$perRak->id}}" selected>{{$perRak->nama_rak}}</option>
                        @else
                            <option value="{{$perRak->id}}">{{$perRak->nama_rak}}</option>
                        @endif
                    @endforeach
                </select>
                @error('rak_id')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div class="pb-3 position-relative">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" accept="image/png, image/jpeg, image/jpg, image/webp" name="gambar" class="mb-1 form-control {{ $errors->has('gambar') ? 'is-invalid' : ''}}">
                @error('gambar')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div class="pb-3 position-relative">
                <label for="gambar" class="form-label">Tag</label>
                <input name="tag" id="inputTag" type="text" placeholder="Isi tag..." class="form-control bg-white pe-5 {{ $errors->has('gambar') ? 'is-invalid' : ''}}">
                <input name="tags" id="inputTags" type="hidden">
                <a type="button" id="addTag" class="position-absolute end-0 btn btn-primary shadow fw-semibold" style="top: 37%;"><i class="fa-solid fa-tag me-2"></i> Tambah</a>
                @error('tag')
                    <div class="invalid-feedback position-absolute bottom-0 ps-2">{{$message}}</div>
                @enderror
            </div>
            <div id="tags" class="d-flex flex-wrap align-items-start border-bottom py-4">
                @if ($buku->tag)
                    @foreach ($buku->tag as $tag)
                        <div class="bg-primary rounded shadow-sm text-white px-2 py-1 me-2 mb-2">
                            <i class="fa-solid fa-tag me-2"></i>
                            {{$tag->nama}}
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="mt-2 d-flex justify-content-end"><a href="/petugas/buku" type="button" class="btn btn-outline-secondary fw-semibold me-3">Kembali</a>
                <button type="submit" class="btn btn-primary fw-semibold">Tambah</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    document.querySelector('#addTag').addEventListener('click', function(){
        var tags = document.querySelector('#tags')
        var inputTag = document.querySelector('#inputTag')
        var inputTags = document.querySelector('#inputTags')
        if (inputTag.value.length > 0) {
            var newTag = document.createElement('div')
            var newTagIcon = document.createElement('i')
            newTagIcon.classList.add('fa-solid', 'fa-tag', 'me-2')
            newTag.classList.add('bg-primary', 'rounded', 'shadow-sm', 'text-white', 'px-2', 'py-1', 'me-2', 'mb-2')
            newTag.appendChild(newTagIcon)
            newTag.append(inputTag.value)
            tags.appendChild(newTag)
            if (inputTags.value.length > 0) {
                inputTags.value += ', '+inputTag.value
            } else {
                inputTags.value = inputTag.value
            }
            inputTag.value = ''
        }
    })
</script>
@endsection