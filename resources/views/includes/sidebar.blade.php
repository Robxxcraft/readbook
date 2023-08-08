<div class="col-3 pe-0 border-top">
    <div class="text-primary fw-bold mt-4 mb-1">Hari ini</div>
    <ul class="ps-3 border-bottom pb-4" style="list-style-type: none;">
        @foreach ($recent as $rc)
            <li href="/buku/{{$rc->slug}}" class="fw-semibold title d-flex">
                <i class="fa-solid fa-book-open pe-2 mt-1"></i>
                <span class=" text-truncate two-lines">{{$rc->judul}}</span>
            </li>
        @endforeach
    </ul>
    <div class="text-primary fw-bold mt-4 mb-2">Tags</div>
    <div class="d-flex flex-wrap align-items-start border-bottom pb-4">
        @foreach ($tags as $tag)
            <a href="/tag/{{$tag->slug}}" class="bg-primary rounded-1 shadow-sm fw-semibold text-white px-2 py-1 me-2 mb-2"><i class="fa-solid fa-tag"></i> {{strtolower($tag->nama)}}</a>
        @endforeach
    </div>
</div>