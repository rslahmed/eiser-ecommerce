@extends('auth.auth_layout')

@section('content')
    <p class="login-card-description">Change your password</p>
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error')}}
        </div>
    @endif
    <form action="{{ route('user.password') }}" method="post">
        @csrf

        <div class="form-group mb-0 mt-4">
            <input type="password" name="oldpassword" class="form-control mb-0 @error('oldpassword') border-danger @enderror" placeholder="Current password">
        </div>
        @error('oldpassword')
        <span class="text-danger font-13">{{ $message }}</span>
        @enderror

        <div class="form-group mb-0 mt-4">
            <input type="password" name="password" class="form-control mb-0 @error('password') border-danger @enderror" placeholder="New password">
        </div>

        @error('password')
        <span class="text-danger font-13">{{ $message }}</span>
        @enderror

        <div class="form-group mt-4 mb-0">
            <input type="password" name="password_confirmation" class="form-control mb-0" placeholder="confirm password">
        </div>

        <button class="btn btn-block login-btn my-4" type="submit">Update </button>

    </form>
    <p class="login-card-footer-text">Don't want to change? <a href="{{ route('user.profile') }}" class="text-reset">Go back</a></p>
@endsection
