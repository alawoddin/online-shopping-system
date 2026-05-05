<section class="features-area section_gap">
    <div class="container">
        <div class="row features-inner">

            @php
                $features = \App\Models\Feature::all();
            @endphp
            <!-- single features -->
            @foreach ($features as $item)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img
                      class="img-fluid"
                       src="{{ !empty($item->image) ? asset($item->image) : asset('uploads/no_image.png') }}"
                      alt=""
                    />
                        </div>
                        <h6>{{$item->title}}</h6>
                        <p>{{$item->description}}</p>
                    </div>
                </div>
            @endforeach

            <!-- single features -->

        </div>
    </div>
</section>
