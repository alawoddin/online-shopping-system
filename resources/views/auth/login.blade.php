<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/fav.png') }}" />
    <title>Login Page</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>

    @include('frontend.body.Header')

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Login / Register</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ url('/') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Login / Register</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Login Area -->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">

                <!-- Left Side -->
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="{{ asset('frontend/assets/img/login.jpg') }}" alt="Login">
                        <div class="hover">
                            <h4>New to our website?</h4>
                            <p>Create your account and start shopping now.</p>
                            <a class="primary-btn" href="{{ route('register') }}">Create an Account</a>
                        </div>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Log in to enter</h3>

                        <!-- FIXED FORM -->
                        <form method="POST" action="{{ route('login') }}" class="row login_form" id="contactForm">

                            @csrf

                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember">Keep me logged in</label>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" class="primary-btn">Log In</button>
                                <a href="#">Forgot Password?</a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Login Area -->

    @include('frontend.body.Footer')

    <!-- JS Files -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Notification -->
    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";

            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

</body>
</html>