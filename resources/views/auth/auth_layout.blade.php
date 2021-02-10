<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eiser</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('auth/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('auth/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('auth/css/login.css')}}">

</head>
<body>


<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="{{asset('auth/images/login.jpg')}}" alt="login" class="login-card-img">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <div class="brand-wrapper">
                            <img src="{{asset('frontend/img/logo.png')}}" alt="logo" class="logo">
                        </div>
                        @yield('content')
                        <nav class="login-card-footer-nav">
                            <a href="{{route('login.facebook')}}" class="btn btn-primary text-white text-uppercase">Login with Google</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<script src="{{asset('auth/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('auth/js/popper.min.js')}}"></script>
<script src="{{asset('auth/js/bootstrap.min.js')}}"></script>
</body>
</html>
