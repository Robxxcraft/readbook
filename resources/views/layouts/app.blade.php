@extends('layouts.base')

@section('body')
    <div class="container">
        @include('includes.navbar')

        @yield('content')
    </div>
@endsection