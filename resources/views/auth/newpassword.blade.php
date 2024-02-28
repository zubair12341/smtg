
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
         
 
            <form method="POST" action="{{ route('password.store') }}" class="login-from">
                    @csrf
                <h1 class="site-title">
                    <a href="#">
                        <img src="{{ asset('assets2/images/logo.png') }}" alt="">
                    </a>
                </h1>
                <h3>Create your new password</h3>
                <input type="hidden" value="{{$user->id}}" name="user_id">
                <div class="form-group">
                    <label for="first_name1">New Password</label>
                    <input type="password" name="password" class="validate @error('password') is-invalid @enderror"  required autofocus>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="first_name1">Confirm Password</label>
                    <input type="password" name="password2" class="validate @error('password2') is-invalid @enderror"  required autofocus>
                        @error('password2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <button class="btn button-primary" type="submit" >Save</button>
                    
                </div>
              
            </form>
      
        </div>
    </div>
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
