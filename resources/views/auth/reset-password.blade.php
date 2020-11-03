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
                            <p class="login-card-description">Reset password</p>


                            <form action="{{ route('password.update') }}" method="post">
                                @csrf

                                <input type="hidden" name="token" value="{{$request->route('token')}}">

                                <div class="form-group mb-0">
                                    <label for="email" class="sr-only">Password</label>
                                    <input type="email" name="email" id="email" class="form-control mb-0" placeholder="Email address" value="{{$request->email}}" readonly>
                                </div>

                                <div class="form-group mb-0 mt-4">
                                    <input type="password" name="password" class="form-control mb-0 @error('password') border-danger @enderror" placeholder="password">
                                </div>
                                @error('password')
                                    <span class="text-danger font-13">{{ $message }}</span>
                                @enderror

                                <div class="form-group mt-4 mb-0">
                                    <input type="password" name="password_confirmation" class="form-control mb-0" placeholder="confirm password">
                                </div>
                                <input name="login" id="login" class="btn btn-block login-btn my-4" type="submit" value="Update">
                            </form>
                            <p class="login-card-footer-text">Don't want to change? <a href="{{ route('login') }}" class="text-reset">Login here</a></p>
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
