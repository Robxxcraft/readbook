@extends('layouts.app')

@section('title')
    Rak {{$namaRak}} - Readbook
@endsection

@section('content')
    
<div class="row">
    @include('includes.sidebar')
    <div class="col-9 border py-3 px-4">
        <div class="fs-5 fw-bold pb-4 position-relative">
            <span class="text-primary">Rak</span>
            @if (request()->page > 1)
                <span class="text-gray"> - Page 
                {{ request()->page }}
                </span>
            @endif
            <div class="badge bg-primary px-2 fw-semibold position-absolute bottom-0 start-0">{{ucfirst($namaRak)}}</div>
        </div>
        @include('includes.listBuku')
    </div> 
 </div>

 <script>
    
 </script>
@endsection