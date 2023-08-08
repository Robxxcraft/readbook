@extends('layouts.base')

@section('title')
    Daftar
@endsection

@section('body')
    <div class="position-absolute vw-100 vh-100">
        <img src="{{asset('images/login.jpg')}}" class="img-fluid vw-100 vh-100" style="object-fit: cover; z-index: -1;" alt="">
    </div>
    <div class="vh-100 vw-100 d-flex justify-content-center align-items-center overflow-hidden">
        <div class="bg-white rounded w-25 overflow-hidden" style="z-index: 1; box-shadow: 0 2px 4px 0 whitesmoke, 0 2px 2px 0 whitesmoke;">
            <div class="d-flex text-center bg-white">
                <a href="/masuk" class="py-2 fw-bold col-6 rounded-end-bottom auth-nav">Masuk</a>
                <div class="py-2 fw-bold col-6 auth-nav-active text-primary border-primary">Daftar</div>
            </div>
            <div class="p-4">
                <div class="fs-5 fw-semibold mb-3">Daftar</div>
                <form action="{{route('daftar')}}" method="POST">
                    @csrf
                    <div class="pb-3 position-relative">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control mb-1 {{$errors->has('nama') ? 'is-invalid' : ''}}" placeholder="Masukan nama..." aria-label="nama">
                        @error('nama')
                            <div class="invalid-feedback position-absolute bottom-0">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="pb-3 position-relative">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control mb-1 {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="Masukan email..." aria-label="email">
                        @error('email')
                            <div class="invalid-feedback position-absolute bottom-0">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="pb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control mb-1 {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="Masukan password..." aria-label="password">
                        @error('password')
                            <div class="invalid-feedback position-absolute bottom-0">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="mt-3 btn btn-primary fw-semibold w-100">Masuk</button>
                </form>
            </div>
        </div>
    </div>   
@endsection