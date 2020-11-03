@extends('auth.auth_layout')

@section('content')
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
@endsection
