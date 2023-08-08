@extends('layouts.app')

@section('title')
    Rak
@endsection

@section('content')
    <div class="row">
        @include('includes.sidebar')
        <div class="col-9 border py-3">
            <div class="fs-5 fw-bold text-primary mb-3 mx-4">Rak buku</div>
            <div class="mx-4 grid grid-cols-4 gap">
                @foreach ($rak as $rk)
                    <a href="/rak/{{$rk->slug}}" class="bg-white text-primary shadow-sm rounded-2 p-4 d-flex flex-column align-items-center justify-content-center">
                        <div class="mb-1">
                            <svg width="20" height="20" viewBox="0 0 24 24" style="width: 40px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0,19H5v5H0v-5ZM5,5V0H2C.895,0,0,.895,0,2v3H5Zm7,0V2c0-1.105-.895-2-2-2h-3V5h5ZM0,7v10H5V7H0Zm7,0v10h5V7H7Zm0,17h5v-5H7v5ZM13.579,7.301l3.468,10.337,4.746-1.575-3.468-10.337-4.746,1.575Zm4.099,12.235l1.44,4.42,4.746-1.575-1.44-4.42-4.746,1.575ZM12.948,5.404l4.746-1.574-.803-2.415c-.348-1.048-1.48-1.616-2.528-1.268l-.949,.315c-1.048,.348-1.616,1.48-1.268,2.528l.803,2.415Z"/>
                            </svg>
                        </div>
                        <div class="text-primary fw-semibold">{{$rk->nama_rak}}</div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection