<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Document</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('layout')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('layout')}}/assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="{{asset('layout')}}/assets/css/animated.css">
    <link rel="stylesheet" href="{{asset('layout')}}/assets/css/owl.css">
    <style>
        .container{
            padding: 70px;
        }
    </style>
</head>
<body>
     @include('sweetalert::alert')
    <div class="container">
    <div id="modal" tyle="display:none;" width="350px">
    <div class="popupHeader">
        <span class="header_title">Login</span>
    </div>

    <section>
        <!-- Social Login -->
        <div class="social_login">
            <div class="">
                {{-- <a href="#" class="social_box fb">
                    <span class="icon"><i class="fab fa-facebook"></i></span>
                    <span class="icon_title">Connect with Facebook</span>

                </a>

                <a href="#" class="social_box google">
                    <span class="icon"><i class="fab fa-google-plus"></i></span>
                    <span class="icon_title">Connect with Google</span>
                </a> --}}
            </div>

            <div class="centeredText">
                {{-- <span>Or use your Email address</span> --}}
            </div>

            <div class="action_btns">
                <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
            </div>
        </div>

        <!-- Username & Password Login form -->
        <div class="user_login">
            <form method="POST" action="{{url('/login')}}" enctype="multipart/form-data">
            @csrf
                <label>Email</label>
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
                    <button type="submit" class="btn btn-primary one_half last">Login</button>
                </div>
            </form>

            {{-- <a href="#" class="forgot_password">Forgot password?</a> --}}
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
                    <button type="submit" class="btn btn-primary one_half last">Register</button>
                </div>
            </form>
        </div>
    </section>
</div>
</div>
<!-- Scripts -->
  <script src="{{asset('layout')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('layout')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('layout')}}/assets/js/owl-carousel.js"></script>
  <script src="{{asset('layout')}}/assets/js/animation.js"></script>
  <script src="{{asset('layout')}}/assets/js/imagesloaded.js"></script>
  <script src="{{asset('layout')}}/assets/js/popup.js"></script>
  <script src="{{asset('layout')}}/assets/js/custom.js"></script>
</body>
</html>