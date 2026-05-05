<section class="banner-area">

  @php

  $homes = \App\Models\Home::all();
    
  @endphp
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
          <div class="col-lg-12">
            <div class="active-banner-slider owl-carousel">
              <!-- single-slide -->
              @foreach ($homes as $item)
                       <div class="row single-slide align-items-center d-flex">
                <div class="col-lg-5 col-md-6">
                  <div class="banner-content">
                    <h1>{{$item->title}}</h1>
                    <p>
                      {{ $item->description }}
                    </p>
                    <div class="add-bag d-flex align-items-center">
                      <a class="add-btn" href=""
                        ><span class="lnr lnr-cross"></span
                      ></a>
                      <span class="add-text text-uppercase">Add to Bag</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="banner-img">
                    <img
                      class="img-fluid"
                       src="{{ !empty($item->image) ? asset($item->image) : asset('uploads/no_image.png') }}"
                      alt=""
                    />
                  </div>
                </div>
              </div>
              @endforeach
       
              <!-- single-slide -->
            
            </div>
          </div>
        </div>
      </div>
    </section>