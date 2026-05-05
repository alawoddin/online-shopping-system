<section class="brand-area section_gap">
    <div class="container">

        @php
            $brands = \App\Models\Brand::all();
        @endphp
        <div class="row">
            @foreach ($brands as $item)
                <a class="col single-img" href="{{ $item->link }}">
                    <img class="img-fluid d-block mx-auto"
                        src="{{ !empty($item->image) ? asset($item->image) : asset('uploads/no_image.png') }}"
                        alt="" />
                </a>
            @endforeach

        </div>
    </div>
</section>
