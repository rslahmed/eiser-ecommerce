@extends('auth.auth_layout')

@section('header-script')
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
@endsection

@section('content')
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="{{asset('assets/images/login.jpg')}}" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="{{asset('assets/images/logo.svg')}}" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Sign into your account</p>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group mb-0">
                                    <input type="email" name="email" class="form-control mb-0 @error('email') border-danger @enderror" placeholder="Email address" value="{{old('email')}}">
                                </div>
                                @error('email')
                                    <span class="text-danger font-13">{{$message}}</span>
                                @enderror

                                <div class="form-group mb-0 mt-4">
                                    <input type="password" name="password" class="form-control mb-0 @error('password') border-danger @enderror" placeholder="***********">
                                </div>
                                @error('password')
                                <span class="text-danger font-13">{{$message}}</span>
                                @enderror
                                <input name="login" id="login" class="btn btn-block login-btn my-4" type="submit" value="Login">
                            </form>
                            <a href="{{route('password.request')}}" class="forgot-password-link">Forgot password?</a>
                            <p class="login-card-footer-text">Don't have an account? <a href="{{route('register')}}" class="text-reset">Register here</a></p>
                            <nav class="login-card-footer-nav">
                                <a href="#">Terms of use.</a>
                                <a href="#">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
