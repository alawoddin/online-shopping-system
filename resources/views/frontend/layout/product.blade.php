 <section class="owl-carousel active-product-area section_gap">
      <!-- single product slide -->
      <div class="single-product-slider">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <div class="section-title">
                <h1>Latest Products</h1>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            @php
              $products =  \App\Models\Product::all();
            @endphp
            <!-- single product -->
            @foreach ($products as $item)
                  <div class="col-lg-3 col-md-6">
              <div class="single-product">
                <img class="img-fluid" src="{{ !empty($item->image) ? asset($item->image) : asset('uploads/no_image.png') }}" alt="" />
                <div class="product-details">
                  <h6>{{$item->title}}</h6>
                  <div class="price">
                    <h6>{{$item->price}}</h6>
                    <h6 class="l-through">{{$item->discount}}</h6>
                  </div>
                  <div class="prd-bottom">
                    <a href="" class="social-info">
                      <span class="ti-bag"></span>
                      <p class="hover-text">add to bag</p>
                    </a>
                    <a href="" class="social-info">
                      <span class="lnr lnr-heart"></span>
                      <p class="hover-text">Wishlist</p>
                    </a>
                    <a href="" class="social-info">
                      <span class="lnr lnr-sync"></span>
                      <p class="hover-text">compare</p>
                    </a>
                    <a href="" class="social-info">
                      <span class="lnr lnr-move"></span>
                      <p class="hover-text">view more</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        
      
         
          </div>
        </div>
      </div>
      <!-- single product slide -->
      <div class="single-product-slider">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <div class="section-title">
                <h1>Coming Products</h1>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- single product -->
             @foreach ($products as $item)
                  <div class="col-lg-3 col-md-6">
              <div class="single-product">
                <img class="img-fluid" src="{{ !empty($item->image) ? asset($item->image) : asset('uploads/no_image.png') }}" alt="" />
                <div class="product-details">
                  <h6>{{$item->title}}</h6>
                  <div class="price">
                    <h6>{{$item->price}}</h6>
                    <h6 class="l-through">{{$item->discount}}</h6>
                  </div>
                  <div class="prd-bottom">
                    <a href="" class="social-info">
                      <span class="ti-bag"></span>
                      <p class="hover-text">add to bag</p>
                    </a>
                    <a href="" class="social-info">
                      <span class="lnr lnr-heart"></span>
                      <p class="hover-text">Wishlist</p>
                    </a>
                    <a href="" class="social-info">
                      <span class="lnr lnr-sync"></span>
                      <p class="hover-text">compare</p>
                    </a>
                    <a href="" class="social-info">
                      <span class="lnr lnr-move"></span>
                      <p class="hover-text">view more</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
         
         
          </div>
        </div>
      </div>
    </section>