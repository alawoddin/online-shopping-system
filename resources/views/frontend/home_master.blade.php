<!doctype html>
<html lang="zxx" class="no-js">
  <head>
    <!-- Mobile Specific Meta -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/fav.png') }}" />
    <!-- Author Meta -->
    <meta name="author" content="CodePixar" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <title>Karma Shop</title>

    {{-- {{ asset('frontend/assets/') }} --}}
    <!--
		CSS 
		============================================= -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/linearicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}" />
  </head>

  <body>
    <!-- Start Header Area -->

    @include('frontend.body.Header')

    @yield('home')
   
    <!-- End Header Area -->

    <!-- start banner Area -->
    
    <!-- End banner Area -->

    <!-- start features Area -->
    
    <!-- end features Area -->

    <!-- Start category Area -->
    
    <!-- End category Area -->

    <!-- start product Area -->
   
    <!-- end product Area -->

    <!-- Start exclusive deal Area -->
   
    <!-- End exclusive deal Area -->

    <!-- Start brand Area -->
    
    <!-- End brand Area -->

    <!-- Start related-product Area -->
    
    <!-- End related-product Area -->

    <!-- start footer Area -->
    @include('frontend.body.Footer')
    <!-- End footer Area -->

    <script src="{{ asset('frontend/assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
      integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
      crossorigin="anonymous"
    ></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/countdown.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('frontend/assets/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
  </body>
</html>
