@extends('frontend.layout')

@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>My Account</h2>
                        <p>Manage your account</p>
                    </div>
                    <div class="page_link">
                        <a href="{{route('home')}}">Home</a>
                        <a href="#">Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        Profile
                    </div>
                    <div class="card-body">
                        <p>Name: {{$user->name ?? ''}}</p>
                        <p>Email: {{$user->email ?? ''}}</p>
                        <a href="{{route('user.password')}}">Change password</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        Shipping address
                    </div>
                    <div class="card-body">
                        <a href="#">+ Add new address</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        Billing address
                    </div>
                    <div class="card-body">
                        <a href="#">+ Add new address</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
