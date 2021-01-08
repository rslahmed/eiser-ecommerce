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
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <p class="mb-0">Profile</p>
                    </div>
                    <div class="card-body">
                        <h5>Name :</h5>
                        <p>{{$user->name}}</p>
                        <h5>Email :</h5>
                        <p>{{$user->email}}</p>
                        <a href="{{route('user.password')}}"><i class="fa fa-edit"></i> Change password</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <p class="mb-0">Shipping address</p>
                    </div>
                    <div class="card-body">
                        @if(!empty(auth()->user()->shippingAddress))
                            <h5>Phone Number :</h5>
                            <p>{{auth()->user()->shippingAddress->number}}</p>
                            <h5>Address :</h5>
                            <p>{{auth()->user()->shippingAddress->address}}</p>

                            <a href="{{route('user.password')}}"><i class="fa fa-edit"></i> Edit address</a>
                        @else
                            <a href="#"><i class="fa fa-plus"></i> Add shipping address</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
