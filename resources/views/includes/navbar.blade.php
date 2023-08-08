<nav class="pb-3 pt-4 d-flex align-items-center justify-content-between">
    <div class="fw-semibold text-primary fs-4 me-5">
        <img src="{{asset('images/logo.png')}}" width="28" height="28" class="me-1" alt="" />
        Readbook
    </div>
    <div class="w-50">
        <div class="position-relative mb-2 pb-1">
            <form action="/buku" method="GET">
                <input type="text" name="cari" placeholder="Cari buku..." class="form-control bg-white rounded-1">
                <button type="submit" class="position-absolute end-0 input-group-text mt-1 mx-2 bg-primary text-white shadow border-0" style="top: 2.5% !important;"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="d-flex align-items-center">
            <a href="/" class="mx-3 fw-semibold {{request()->is('/') ? 'text-primary border-bottom border-primary' : 'text-secondary'}}">Utama</a>
            <a href="/buku" class="mx-3 fw-semibold {{request()->is('buku') ? 'text-primary border-bottom border-primary' : 'text-secondary'}}">Buku</a>
            <a href="/rak" class="mx-3 fw-semibold {{request()->is('rak') ? 'text-primary border-bottom border-primary' : 'text-secondary'}}">Rak</a>
            <a href="/peminjaman" class="mx-3 fw-semibold {{request()->is('peminjaman') ? 'text-primary border-bottom border-primary' : 'text-secondary'}}">Peminjaman</a>
            <a href="/pengembalian" class="mx-3 fw-semibold {{request()->is('pengembalian') ? 'text-primary border-bottom border-primary' : 'text-secondary'}}">Pengembalian</a>
            <a href="/tentang" class="mx-3 fw-semibold {{request()->is('tentang') ? 'text-primary border-bottom border-primary' : 'text-secondary'}}">Tentang</a>
        </div>
    </div>
    <div class="d-flex">
        @if (Auth::guard('anggota')->user())
            <div class="rounded-circle bg-secondary position-relative me-2 avatar">
                <i class="fa-solid fa-user text-white position-absolute"></i>
            </div>
            <div class="fw-semibold truncate text-ellipsis">{{Auth::guard('anggota')->user()->nama}}</div>
            <span class="text-secondary mx-3">|</span>
            <a href="/logout" class="text-danger fw-bold">
                <i class="fa-solid fa-arrow-right-from-bracket me-1"></i> 
                Logout
            </a>
        @elseif(Auth::guard('petugas')->user())
            <div class="d-flex">
                <a href="/petugas/dashboard" class="d-block link fw-semibold text-warning d-flex align-items-center">
                    <i class="fa-solid fa-cog me-2"></i>
                    <div class="me-3">Petugas</div>
                    <i class="fa-solid fa-angle-right"></i>
                </a>
                <span class="text-secondary mx-3">|</span>
                <a href="/logout" class="d-block link-danger fw-semibold text-danger d-flex align-items-center">
                    <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                    <div class="me-3">Logout</div>
                    <i class="fa-solid fa-angle-right"></i>
                </a>
            </div>
        @else
            <div class="d-flex align-items-center">
                <a href="/masuk" class="btn btn-primary rounded-1 shadow-sm fw-semibold">Masuk</a>
                <a href="/daftar" class="btn btn-outline-secondary rounded-1 shadow-sm fw-semibold ms-3">Daftar</a>
            </div>
        @endif
    </div>
</nav>