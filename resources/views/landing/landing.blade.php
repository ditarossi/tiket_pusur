
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Landing Page</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('layout')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('layout')}}/assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="{{asset('layout')}}/assets/css/animated.css">
    <link rel="stylesheet" href="{{asset('layout')}}/assets/css/owl.css">

    <!-- CSS TEMPLATE GAMBAR -->
    <!-- Favicons -->
    <link href="{{asset('pict')}}/assets/img/favicon.png" rel="icon">
    <link href="{{asset('pict')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="{{asset('pict')}}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <!-- <link href="{{asset('pict')}}/assets/vendor/aos/aos.css" rel="stylesheet"> -->
    <!-- <link href="{{asset('pict')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="{{asset('pict')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('pict')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('pict')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{asset('pict')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    
    <link href="{{asset('pict')}}/assets/css/style.css" rel="stylesheet">
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  @include('landing.navbar')
  <!-- ***** Header Area End ***** -->
  
  <div id="modal" class="popupContainer" style="display:none;">
    <div class="popupHeader">
        <span class="header_title">Login</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </div>

    <section class="popupBody">
        <!-- Social Login -->
        <div class="social_login">
            <div class="">
                <a href="#" class="social_box fb">
                    <span class="icon"><i class="fab fa-facebook"></i></span>
                    <span class="icon_title">Connect with Facebook</span>

                </a>

                <a href="#" class="social_box google">
                    <span class="icon"><i class="fab fa-google-plus"></i></span>
                    <span class="icon_title">Connect with Google</span>
                </a>
            </div>

            <div class="centeredText">
                <span>Or use your Email address</span>
            </div>

            <div class="action_btns">
                <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
            </div>
        </div>

        <!-- Username & Password Login form -->
        <div class="user_login">
            <form method="POST" action="/login" enctype="multipart/form-data">
            @csrf
                <label>Email / Username</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                <br />

                <label>Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                <br />

                <div class="checkbox">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                    <label for="remember">Remember me on this computer</label>
                </div>

                <div class="action_btns">
                    <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                    <div class="one_half">
                            <input class="btn btn_red" type="submit" name="login" value="Sumbit">
                    </div>
                </div>
            </form>

            <a href="#" class="forgot_password">Forgot password?</a>
        </div>

        <!-- Register Form -->
        <div class="user_register">
            <form method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
            @csrf    
                <label>Full Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                <br />

                <label>Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                <br />

                <label>Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                <br />

                <label>Konfirmasi Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" />
                <br />

                <div class="checkbox">
                    <input id="send_updates" type="checkbox" />
                    <label for="send_updates">Send me occasional email updates</label>
                </div>

                <div class="action_btns">
                    <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </section>
</div>


<!--content-->

@yield('content')

<!--content-->


@include('landing.footer')
  <!-- Scripts -->
  <script src="{{asset('layout')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('layout')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('layout')}}/assets/js/owl-carousel.js"></script>
  <script src="{{asset('layout')}}/assets/js/animation.js"></script>
  <script src="{{asset('layout')}}/assets/js/imagesloaded.js"></script>
  <script src="{{asset('layout')}}/assets/js/popup.js"></script>
  <script src="{{asset('layout')}}/assets/js/custom.js"></script>

  <!-- SCRIPT TEMPLATE GAMBAR -->
  <!-- Vendor JS Files -->
  <script src="{{asset('pict')}}/assets/vendor/purecounter/purecounter.js"></script>
  <script src="{{asset('pict')}}/assets/vendor/aos/aos.js"></script>
  <script src="{{asset('pict')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('pict')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('pict')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{asset('pict')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('pict')}}/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{asset('pict')}}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{asset('pict')}}/assets/js/main.js"></script>
</body>
</html>