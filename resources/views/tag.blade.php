@extends('layouts.app')

@section('title')
    Tag {{$namaTag}} - Readbook
@endsection

@section('content')
    
<div class="row">
    @include('includes.sidebar')
    <div class="col-9 border py-3 container-fluid">
        <div class="fs-5 fw-bold mb-1">
            <span class="text-primary">Tag</span>
            @if (request()->page > 1)
                <span class="text-gray"> - Page 
                {{ request()->page }}
                </span>
            @endif
        </div>
        <div class="d-inline-block bg-primary rounded-1 shadow-sm text-white fw-semibold px-2 py-1"><i class="fa-solid fa-tag"></i> {{strtolower($namaTag)}}</div>
        @include('includes.listBuku')
    </div> 
 </div>

 <script>
    
 </script>
@endsection