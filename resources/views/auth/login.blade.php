
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- favicon -->
      <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap.min.css') }}" media="all">
      <!-- Fonts Awesome CSS -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/all.min.css') }}">
      <!-- google fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
      <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/style.css') }}">
      <title>Smart Tour Guide | Login </title>
</head>
<body>
    <div class="login-page" style="background-image: url({{ asset('assets2/images/bg.jpg') }});">
        <div class="login-from-wrap">

            <form method="POST" action="{{ route('login') }}" class="login-from">
                    @csrf
                <h1 class="site-title">
                    <a href="#">
                        <img src="{{ asset('assets2/images/logo.png') }}" alt="">
                    </a>
                </h1>
                <div class="form-group">
                    <label for="first_name1">Email</label>
                    <input type="text" name="email" class="validate @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="last_name">Password</label>
                    <input id="last_name" name="password" type="password" class="validate @error('password') is-invalid @enderror" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <button class="btn button-primary" type="submit" >Login</button>
                    
                </div>
                <a href="{{route('forgot.page')}}" class="for-pass">Forgot Password?</a>

                <div class="form-group d-flex justify-content-center">
                    <a href="{{ route('login.redirect.google') }}" class="btn btn-google"><i class="fab fa-google mx-2"></i>Login with Google</a>
                </div>
            </form>
        </div>
    </div>
<style>
    .btn-google {
    background-color: #DB4437; /* Google Red */
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    display: inline-block;
}

.btn-google:hover {
    background-color: #c13584;
    color: white /* Google Red Hover */
}
</style>

    <!-- *Scripts* -->
    <script src="{{ asset('assets2/js/jquery-3.2.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets2/js/canvasjs.min.js') }}"></script>
    <script src="{{ asset('assets2/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets2/js/dashboard-custom.js') }}"></script>
</body>
</html>
