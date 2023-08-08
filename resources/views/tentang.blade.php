@extends('layouts.app')

@section('title')
    Tentang
@endsection

@section('content')
    <div class="bg-white d-flex justify-content-center rounded py-5 px-3 mt-3 mx-5">
        <div class="" style="padding: 0;">
            <img src="{{asset('images/background.jpg')}}" class="img-fluid rounded border" alt="" style="height: 280px; width: 340px;">
        </div>
        <div class="ps-3" style="padding: 0;">
            <div class="p-3">
                <div class="fw-semibold text-primary fs-5 mb-3">Readbook v.1</div>
                <div class="fw-semibold text-primary">Creator</div>    
                <div class="text-secondary mb-2">Robxxcraft</div>
                <div class="fw-semibold text-primary">Alamat</div>    
                <div class="text-secondary">Bekasi, Jawa Barat, Indonesia 17320</div>
            </div>
        </div>
    </div>
@endsection