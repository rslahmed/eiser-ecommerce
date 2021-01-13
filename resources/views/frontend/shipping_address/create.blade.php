@extends('frontend.layout')

@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Shipping address</h2>
                        <p>Manage your address</p>
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
        <div class="billing_details">
            <div class="row">
                <div class="col-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <p class="mb-0">@if(!empty(auth()->user()->shippingAddress)) Update @else Create @endif Address</p>
                        </div>
                        <div class="card-body">
                            <form class="row contact_form" action="@if(!empty(auth()->user()->shippingAddress)) {{route('address.update')}} @else {{route('address.store')}}  @endif" method="post" novalidate="novalidate">
                                @csrf

                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Full name"
                                           value="Admin" readonly>
                                </div>

                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="Email address" value="admin@admin" readonly>
                                </div>

                                <div class="col-md-12 form-group p_star mb-1">
                                    <input type="text" class="form-control" name="number" placeholder="Number" value="{{old('number') ?? auth()->user()->shippingAddress->number ?? ''}}">
                                </div>

                                <div class="col-md-12 form-group">
                                    <textarea class="form-control text-left" name="address" rows="1" placeholder="Address">{{old('number') ?? auth()->user()->shippingAddress->address ?? ''}}</textarea>
                                </div>

                                <button type="submit" class=" main_btn ml-3">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
