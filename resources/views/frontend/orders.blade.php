@extends('frontend.layout')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>My Orders</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="{{route('home')}}">Home</a>
                        <a href="#">My Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                @foreach($orders as $order)
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-baseline">
                        <h5 class="mb-0">Order ID: #{{$order->id}}</h5>
                        <div class="base">{{$order->status}}</div>
                    </div>
                    <div class="card-body ">
                        @foreach(json_decode($order->product_details) as $row)
                            <div class="d-flex align-items-center mb-3">
                                <a href="{{route('product.view', $row->product_slug)}}" class=" d-block mr-5">
                                    <img src="{{asset($row->product_image)}}" style="width: 80px">
                                </a>
                                <div class="w-25">
                                   <p class="lead"> {{$row->product_name}}</p>
                                </div>
                                <div class="ml-4">
                                    <p>x{{$row->quantity}}</p>
                                </div>
                                <div class="ml-auto">
                                    <h4>${{$row->price * $row->quantity}}</h4>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
