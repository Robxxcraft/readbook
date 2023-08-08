@extends('layouts.base')

@section('body')
    <div class="d-flex">
        <!-- sidebar -->
        <div class="vh-100 text-white position-fixed" style="width: 20%; background-color:rgb(138, 6, 6);">
            <div class="w-100">
                <a href="/" class="d-block text-white px-4 py-3 fw-bold fs-5">
                    <svg class="me-1" version="1.0" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                            <path d="M1141 5066 c-41 -23 -50 -53 -51 -167 l0 -106 158 -52 c352 -116 732 -300 1020 -493 40 -27 77 -48 83 -46 15 5 -101 192 -176 285 -199 248 -513 450 -871 562 -109 34 -128 36 -163 17z"/>
                            <path d="M3790 5041 c-451 -151 -782 -406 -985 -759 -26 -45 -46 -84 -44 -87 3 -2 32 14 64 36 301 202 681 388 1038 506 l167 55 0 104 c0 115 -10 148 -51 170 -40 20 -61 18 -189 -25z"/>
                            <path d="M472 4723 c-26 -22 -202 -243 -202 -253 0 -4 430 -196 956 -428 953 -419 956 -420 990 -406 22 9 71 14 144 14 l110 0 0 107 0 108 -73 70 c-210 202 -637 439 -1092 605 -245 90 -672 200 -774 200 -22 0 -48 -7 -59 -17z"/>
                            <path d="M4515 4733 c-473 -100 -805 -213 -1177 -399 -266 -133 -496 -283 -620 -405 l-68 -66 0 -107 0 -106 110 0 c73 0 122 -5 145 -14 l34 -15 943 416 c519 228 949 417 956 420 6 3 12 9 12 13 0 11 -175 229 -202 253 -19 16 -8121 -133 10z"/>
                            <path d="M0 2657 l0 -1732 1041 -458 c572 -252 1047 -461 1055 -464 12 -4 14 219 14 1729 l0 1735 -1049 462 c-577 253 -1052 461 -1055 461 -3 0 -6 -780 -6 -1733z m1095 708 c578 -271 792 -377 804 -395 14 -21 16 -78 16 -508 l0 -484 -28 -24 c-16 -13 -41 -24 -57 -24 -36 0 -1598 733 -1622 762 -17 19 -18 58 -18 508 l0 487 25 27 c20 21 33 27 59 24 19 -2 387 -169 821 -373z m-9 -1366 c434 -204 797 -380 807 -391 41 -48 3 -138 -59 -138 -35 0 -1595 735 -1623 764 -12 13 -21 36 -21 53 0 39 42 83 80 83 14 0 382 -167 816 -371z m-8 -454 c386 -182 615 -295 630 -311 12 -14 22 -36 22 -50 0 -33 -51 -84 -83 -84 -19 0 -633 283 -1178 544 -76 36 -99 61 -99 107 0 27 53 79 80 79 11 0 294 -128 628 -285z"/>
                            <path d="M360 3158 l1 -363 681 -320 c374 -176 685 -321 689 -323 5 -2 9 160 9 360 l0 363 -681 320 c-375 176 -685 322 -690 323 -5 2 -9 -151 -9 -360z"/>
                            <path d="M4058 3928 l-1048 -461 0 -1735 c0 -1647 1 -1734 18 -1727 9 3 484 212 1055 463 l1037 456 0 1733 c0 953 -3 1733 -7 1733 -5 -1 -479 -208 -1055 -462z m847 -214 l25 -27 0 -487 c0 -450 -1 -489 -17 -508 -27 -32 -1587 -762 -1627 -762 -22 0 -40 8 -57 26 l-24 26 0 482 c0 423 2 485 16 506 21 32 1578 768 1627 769 23 1 40 -7 57 -25z m-1 -1370 c31 -32 34 -71 6 -106 -24 -31 -1584 -768 -1624 -768 -59 0 -98 85 -62 135 19 26 1583 763 1622 764 21 1 40 -7 58 -25z m-183 -543 c37 -37 37 -72 2 -110 -35 -37 -1211 -591 -1255 -591 -66 0 -101 83 -55 134 26 29 1218 595 1255 596 13 0 37 -13 53 -29z"/>
                            <path d="M4063 3196 l-682 -321 -1 -363 c0 -209 4 -362 9 -360 5 2 315 147 690 323 l681 320 0 363 c0 199 -3 362 -7 361 -5 -1 -315 -146 -690 -323z"/>
                            <path d="M2280 3290 l0 -190 280 0 280 0 0 190 0 190 -280 0 -280 0 0 -190z"/>
                            <path d="M2280 2835 l0 -95 280 0 280 0 0 95 0 95 -280 0 -280 0 0 -95z"/>
                            <path d="M2280 1735 l0 -825 280 0 280 0 0 825 0 825 -280 0 -280 0 0 -825z"/>
                            <path d="M2280 640 l0 -100 280 0 280 0 0 100 0 100 -280 0 -280 0 0 -100z"/>
                            <path d="M2280 185 l0 -185 280 0 280 0 0 185 0 185 -280 0 -280 0 0 -185z"/>
                        </g>
                    </svg>
                    Readbook</a>
                <a href="/petugas/dashboard" class="text-white mb-3 px-4 py-2 d-flex align-items-center fw-semibold {{request()->is('petugas/dashboard') ? 'brown' : ''}}"><i class="fa-solid fa-dashboard fs-5 ps-1" style="width: 40px;"></i> <div class="pe-1">Dashboard</div></a>
                <div class="mb-1 text-uppercase fw-medium px-4 fw-semibold" style="font-size: 0.78rem; color: rgb(201, 196, 190);">managements</div>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item border-0">
                        <div class="accordion-header" id="flush-headingOne">
                            <button class="text-white py-2 accordion-button collapsed  {{request()->is('petugas/buku') || request()->is('petugas/buku/tambah') || request()->is('petugas/buku/edit') ? 'brown' : ''}}" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="box-shadow: none !important; background-color:rgb(138, 6, 6);">
                                <div class="d-flex px-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" style="width: 40px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 3.25001H6.75C6.10713 3.23114 5.483 3.4679 5.01439 3.9084C4.54577 4.3489 4.2709 4.9572 4.25 5.60001V18C4.27609 18.7542 4.60027 19.4673 5.15142 19.9829C5.70258 20.4984 6.43571 20.7743 7.19 20.75H19C19.1981 20.7474 19.3874 20.6676 19.5275 20.5275C19.6676 20.3874 19.7474 20.1981 19.75 20V4.00001C19.7474 3.8019 19.6676 3.61264 19.5275 3.47254C19.3874 3.33245 19.1981 3.2526 19 3.25001ZM18.25 19.25H7.19C6.83339 19.2748 6.48151 19.1571 6.21156 18.9227C5.94161 18.6884 5.77562 18.3566 5.75 18C5.77562 17.6435 5.94161 17.3116 6.21156 17.0773C6.48151 16.843 6.83339 16.7253 7.19 16.75H18.25V19.25ZM18.25 15.25H7.19C6.68656 15.2506 6.19135 15.3778 5.75 15.62V5.60001C5.7729 5.3559 5.89028 5.13039 6.0771 4.9716C6.26392 4.8128 6.50538 4.73329 6.75 4.75001H18.25V15.25Z"/>
                                        <path d="M8.75 8.75H15.25C15.4489 8.75 15.6397 8.67098 15.7803 8.53033C15.921 8.38968 16 8.19891 16 8C16 7.80109 15.921 7.61032 15.7803 7.46967C15.6397 7.32902 15.4489 7.25 15.25 7.25H8.75C8.55109 7.25 8.36032 7.32902 8.21967 7.46967C8.07902 7.61032 8 7.80109 8 8C8 8.19891 8.07902 8.38968 8.21967 8.53033C8.36032 8.67098 8.55109 8.75 8.75 8.75Z"/>
                                        <path d="M8.75 12.25H15.25C15.4489 12.25 15.6397 12.171 15.7803 12.0303C15.921 11.8897 16 11.6989 16 11.5C16 11.3011 15.921 11.1103 15.7803 10.9697C15.6397 10.829 15.4489 10.75 15.25 10.75H8.75C8.55109 10.75 8.36032 10.829 8.21967 10.9697C8.07902 11.1103 8 11.3011 8 11.5C8 11.6989 8.07902 11.8897 8.21967 12.0303C8.36032 12.171 8.55109 12.25 8.75 12.25Z"/>
                                    </svg>
                                    <div class="fw-semibold ms-1">Buku</div>
                                </div>
                            </button>
                        </div>
                        <div id="flush-collapseOne" class="pb-3 pt-2 px-4 collapse" style="background-color:rgb(138, 6, 6);" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="text-white bg-primary p-2" style="border-radius: 3px">
                                <a href="/petugas/buku/tambah" class="d-block fw-semibold py-2 mx-2 {{request()->is('petugas/buku/tambah') ? 'bg-white text-primary':'text-white'}}" style="border-radius: 6px"><i class="fa-solid fa-plus" style="width: 40px"></i> Tambah</a>
                                <a href="/petugas/buku" class="d-block fw-semibold py-2 mx-2 {{request()->is('petugas/buku') ? 'bg-white text-primary':'text-white'}}" style="border-radius: 6px"><i class="fa-solid fa-gear" style="width: 40px"></i> Kelola</a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0">
                        <div class="accordion-header" id="flush-headingTwo">
                            <button class="text-white py-2 mt-1 accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="box-shadow: none !important; background-color:rgb(138, 6, 6);">
                                <div class="d-flex px-1">
                                    <svg width="20" height="20" viewBox="0 0 24 24" style="width: 40px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0,19H5v5H0v-5ZM5,5V0H2C.895,0,0,.895,0,2v3H5Zm7,0V2c0-1.105-.895-2-2-2h-3V5h5ZM0,7v10H5V7H0Zm7,0v10h5V7H7Zm0,17h5v-5H7v5ZM13.579,7.301l3.468,10.337,4.746-1.575-3.468-10.337-4.746,1.575Zm4.099,12.235l1.44,4.42,4.746-1.575-1.44-4.42-4.746,1.575ZM12.948,5.404l4.746-1.574-.803-2.415c-.348-1.048-1.48-1.616-2.528-1.268l-.949,.315c-1.048,.348-1.616,1.48-1.268,2.528l.803,2.415Z"/>
                                    </svg>
                                    <div class="fw-semibold ms-1">Rak</div>
                                </div>
                            </button>
                        </div>
                        <div id="flush-collapseTwo" class="pb-3 pt-2 px-4 collapse" style="background-color:rgb(138, 6, 6);" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="text-white bg-primary p-2" style="border-radius: 3px">
                                <a href="/petugas/rak/tambah" class="d-block fw-semibold py-2 mx-2 {{request()->is('petugas/rak/tambah') ? 'bg-white text-primary':'text-white'}}" style="border-radius: 6px"><i class="fa-solid fa-plus" style="width: 40px"></i> Tambah</a>
                                <a href="/petugas/rak" class="d-block fw-semibold py-2 mx-2 {{request()->is('petugas/rak') ? 'bg-white text-primary':'text-white'}}" style="border-radius: 6px"><i class="fa-solid fa-gear" style="width: 40px"></i> Kelola</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/petugas/peminjaman" class="text-white d-block px-4 py-2 mt-1 fw-semibold {{request()->is('petugas/peminjaman') || request()->is('petugas/peminjaman/tambah') || request()->is('petugas/peminjaman/edit') ? 'brown' : ''}}">
                    <i class="fa-solid fa-calendar-days fs-5" style="width: 40px"></i>
                    Peminjaman
                </a>
                <a href="/petugas/pengembalian" class="text-white d-block px-4 py-2 mt-1 fw-semibold {{request()->is('petugas/pengembalian') || request()->is('petugas/pengembalian/tambah') || request()->is('petugas/pengembalian/edit') ? 'brown' : ''}}">
                    <i class="fa-solid fa-calendar-check fs-5" style="width: 40px"></i>
                    Pengembalian
                </a>
                <div class="accordion accordion-flush" id="accordionFlush">
                    <div class="accordion-item border-0">
                        <div class="accordion-header" id="flush-headingThree">
                            <button class="text-white accordion-button collapsed py-2 mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree" style="box-shadow: none !important; background-color:rgb(138, 6, 6);">
                                <div class="d-flex px-1">
                                    <i class="fa-solid fa-user-cog fs-5" style="width: 40px"></i>
                                    <div class="fw-semibold ms-1">Petugas</div>
                                </div>
                            </button>
                        </div>
                        <div id="flush-collapseThree" class="pb-3 px-4 collapse" style="background-color:rgb(138, 6, 6);" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlush">
                            <div class="text-white bg-primary p-2" style="border-radius: 3px">
                                <a href="/petugas/data/tambah" class="d-block text-white fw-semibold py-2 mx-2 {{request()->is('petugas/data/tambah') ? 'bg-white text-primary':'text-white'}}" style="border-radius: 6px"><i class="fa-solid fa-plus" style="width: 40px"></i> Tambah</a>
                                <a href="/petugas/data" class="d-block text-white fw-semibold py-2 mx-2 {{request()->is('petugas/data') ? 'bg-white text-primary':'text-white'}}" style="border-radius: 6px"><i class="fa-solid fa-gear" style="width: 40px"></i> Kelola</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- body -->
        <div class="position-absolute" style="right: 0; width: 80%;">
            <!-- top nav -->
            <div class="bg-white p-3 w-100"><i class="fa-solid fa-bars"></i></div>

            <!-- content body -->
            @yield('content')
        </div>
    </div>
@endsection