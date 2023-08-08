@extends('layouts.app')

@section('title')
    Pencarian {{$cari}} - Readbook
@endsection

@section('content')
    
<div class="row">
    @include('includes.sidebar')
    <div class="col-9 border py-3 px-4">
        <div class="fs-5 fw-bold text-primary pb-4 position-relative">
            Pencarian
            <span class="ms-2 badge bg-primary px-2 fw-semibold position-absolute bottom-0 start-0">{{ucfirst($cari)}}</span>
        </div>
        @include('includes.buku')
    </div> 
 </div>

 <script>
    
 </script>
@endsection