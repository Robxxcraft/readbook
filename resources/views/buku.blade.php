@extends('layouts.app')

@section('title')
@if ($cari)
    Pencarian {{$cari}} - Readbook
@else
    Buku - Readbook
@endif
@endsection

@section('content')
    
<div class="row">
    @include('includes.sidebar')
    <div class="col-9 border py-3 px-4">
        @if ($cari)
            <div class="fs-5 fw-bold text-primary pb-4 position-relative">
                Pencarian
                <span class="badge bg-primary px-2 fw-semibold position-absolute bottom-0 start-0">{{ucfirst($cari)}}</span>
            </div>
        @else
            <div class="fs-5 fw-bold">
                <span class="text-primary">Terbaru</span>
                @if (request()->page > 1)
                    <span class="text-gray"> - Page 
                    {{ request()->page }}
                    </span>
                @endif
            </div>
        @endif
        @include('includes.listBuku')
    </div> 
 </div>

 <script>
    
 </script>
@endsection