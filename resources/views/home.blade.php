@extends('layouts.app')

@section('title')
    Home - {{config('app.name')}}
@endsection

@section('content')
    <div class="rounded mt-3 position-relative" style="overflow: hidden; width: 100%; height: 480px; background-color: lightgray;">
        <img class="img-fluid" src="{{asset('images/background-2.jpg')}}" style="filter: brightness(50%);" alt="">
        <div class="position-absolute text-white w-100" style="bottom: 1%;">
            <div class="d-flex justify-content-center mb-3">
                <a href="/buku" class="btn btn-primary shadow rounded fw-semibold fs-5 border">Pinjam buku</a>
            </div>
            <div class="text-center mb-3 fw-semibold fs-3">Pinjam beberapa buku di Readbook</div>
        </div>
    </div>
@endsection