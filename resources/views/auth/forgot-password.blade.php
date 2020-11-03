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
                            <p class="login-card-description">Forgot password</p>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form action="{{ route('password.email') }}" method="post">
                                @csrf
                                <div class="form-group mb-0">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control mb-0 @error('email') border-danger @enderror" placeholder="Email address" value="{{old('email')}}">
                                </div>
                                @error('email')
                                    <span class="text-danger font-13">{{ $message }}</span>
                                @enderror
                                <input name="login" id="login" class="btn btn-block login-btn my-4" type="submit" value="Reset">
                            </form>
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
