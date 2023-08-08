@extends('layouts.admin')

@section('title')
    Kelola Rak - Readbook    
@endsection

@section('content')
    <div class="p-4 mx-3">
        <div class="fs-5 fw-bold mb-3 text-primary">Kelola Rak</div>
        <div class="text-secodary mb-3"><i class="fa-solid fa-plus-circle me-1"></i> Tambah Rak</div>
        <div class="input-group w-25">
            <form action="/petugas/rak" method="get">
                @csrf
                <input name="search" type="text" placeholder="Search..." class="form-control bg-white">
                <a type="submit" class="input-group-text btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></a>
            </form>
        </div>
        
        <div class="table-responsive">
            <table style="width: 75%;" class="table mx-auto table-hover overflow-hidden shadow-sm">
                <thead>
                    <tr class="bg-primary text-white">
                        <th class="px-3">#</th>
                        <th class="px-3">Nama Rak</th>
                        <th class="px-3">Lokasi</th>
                        {{-- <th class="px-3">Role</th>
                        <th class="px-3">Password</th> --}}
                        <th class="px-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $rak)
                        <tr>
                            <td class="px-3 text-primary fw-semibold bg-white">{{$rak->id}}</td>
                            <td class="px-3 fw-semibold text-break bg-white">{{$rak->nama_rak}}</td>
                            <td class="px-3 text-secondary bg-white">{{$rak->lokasi}}</td>
                            {{-- <td class="px-3"><span class="badge bg-primary">{{$rak->role->role_name}}</span></td> --}}
                            {{-- <td class="px-3 overflow-hidden">
                                <div class="text-dark text-break">{{$user->password}}</div>
                            </td> --}}
                            <td class="px-3 bg-white">
                                <div class="d-flex align-items-center">
                                    <a href="/petugas/data/edit/{{$rak->id}}" class="rounded btn me-2 btn-warning px-2 py-1 text-white">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a href="/petugas/data/{{$rak->id}}/delete" class="rounded btn btn-danger px-2 py-1 text-white">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="mt-4 d-flex justify-content-end">{{$data->links()}}</div>
    </div>
@endsection