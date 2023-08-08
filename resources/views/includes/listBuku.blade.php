<div class="row">
    @if (count($data))
        @foreach ($data as $buku)
            <div class="col-3 p-3">
                <div class="w-100 bg-secondary shadow rounded-1 overflow-hidden h-200">
                    @if (isset($buku->gambar))
                        <img class="img-fluid h-100 w-100 object-fit" src="{{$buku->gambar}}" alt="{{$buku->judul}}">
                    @endif
                </div>
                <div class="position-relative h-200">
                    <div class="fw-semibold mt-3 text-secondary mb-1 text-sm"><i class="fa-solid fa-clock me-1"></i> {{$buku->created_at->translatedFormat('d M Y')}}</div>
                    <div class="text-truncate two-lines title">
                        <a href="/buku/{{$buku->slug}}" class="mt-2 fw-semibold">{{$buku->judul}}</a>
                    </div>
                    <div class="text-secondary mb-1 text-truncate two-lines">{{$buku->pengarang}}</div>
                    <div class="position-absolute bottom-0 w-100">
                        <div class="d-block badge bg-primary text-truncate mt-2 mb-4 px-2 py-1">{{$buku->rak->nama_rak}}</div>
                        <a href="/buku/{{$buku->slug}}/pinjam" class="position mt-1 btn btn-primary rounded-1 w-100 py-1 fw-semibold"><i class="me-1 fa-solid fa-calendar-plus"></i> Pinjam</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-12 text-center fw-semibold fs-5 text-secondary">
            Tidak di temukan
        </div>
    @endif
</div>
<div class="mt-3 d-flex justify-content-end">{!! $data->links() !!}</div>