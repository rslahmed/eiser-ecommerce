@extends('frontend.layout')

@section('content')

    <!--================Home Banner Area =================-->
    <section class="home_banner_area mb-80">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-12">
                        <p class="sub text-uppercase">men Collection</p>
                        <h3><span>Show</span> Your <br />Personal <span>Style</span></h3>
                        <h4>Fowl saw dry which a above together place.</h4>
                        <a class="main_btn mt-40" href="#">View Collection</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!-- Start feature Area -->
    <section class="feature-area section_gap_bottom_custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-money"></i>
                            <h3>Money back gurantee</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-truck"></i>
                            <h3>Free Delivery</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-support"></i>
                            <h3>Alway support</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-blockchain"></i>
                            <h3>Secure payment</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature Area -->


    <!--================ Feature Product Area =================-->
    <section class="feature_product_area section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>Featured product</span></h2>
                        <p>Bring called seed first of third give itself now ment</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($products as $row)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{route('product.view', $row->slug)}}">
                                    <img class="card-img" src="{{asset($row->image_one)}}" alt="{{$row->product_name}}" />
                                </a>
                                <div class="p_icon">
                                    <a href="{{route('product.view', $row->slug)}}">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <i class="ti-heart"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="add_to_cart" data-id="{{$row->id}}">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-btm">
                                <a href="#" class="d-block">
                                    <h4>{{$row->product_name}}</h4>
                                </a>
                                <div class="mt-3">
                                    <span class="mr-4">${{$row->selling_price}}</span>
                                    @if(!empty($row->before_price))
                                        <del>${{$row->before_price}}</del>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--================ End Feature Product Area =================-->

    {{--banner section--}}
    <section class="offer_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="offset-lg-4 col-lg-6 text-center">
                    <div class="offer_content">
                        <h3 class="text-uppercase mb-40">all men’s collection</h3>
                        <h2 class="text-uppercase">50% off</h2>
                        <a href="#" class="main_btn mb-20 mt-5">Discover Now</a>
                        <p>Limited Time Offer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================ New Product Area =================-->
    <section class="new_product_area section_gap_top section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>new products</span></h2>
                        <p>Bring called seed first of third give itself now ment</p>
                    </div>
                </div>
            </div>

            <div class="row">
            @foreach($products as $row)
                @if($loop->index < 1)
                <div class="col-lg-6">
                    <div class="new_product">
                        <h5 class="text-uppercase">collection of 2021</h5>
                        <a href="{{route('product.view', $row->slug)}}">
                        <h3 class="text-uppercase">
                            {{$row->product_name}}
                        </h3>
                        </a>
                        <div class="product-img">
                            <a href="{{route('product.view', $row->slug)}}">
                            <img class="img-fluid" src="{{asset($row->image_one)}}" alt="" />
                            </a>
                        </div>
                        <h4>
                            <span class="mr-4">${{$row->selling_price}}</span>
                            @if(!empty($row->before_price))
                                <del>${{$row->before_price}}</del>
                            @endif
                        </h4>
                        <button class="main_btn add_to_cart" data-id="{{$row->id}}">Add to cart</button>
                    </div>
                </div>
                    @endif
                @endforeach

                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="row">
                        @foreach($products as $row)
                            <div class="col-md-6">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{route('product.view', $row->slug)}}">
                                            <img class="card-img" src="{{asset($row->image_one)}}" alt="{{$row->product_name}}" />
                                        </a>
                                        <div class="p_icon">
                                            <a href="{{route('product.view', $row->slug)}}">
                                                <i class="ti-eye"></i>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <i class="ti-heart"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="add_to_cart" data-id="{{$row->id}}">
                                                <i class="ti-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-btm">
                                        <a href="#" class="d-block">
                                            <h4>{{$row->product_name}}</h4>
                                        </a>
                                        <div class="mt-3">
                                            <span class="mr-4">${{$row->selling_price}}</span>
                                            @if(!empty($row->before_price))
                                                <del>${{$row->before_price}}</del>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End New Product Area =================-->
@endsection

@section('script')
    <script !src="">
        // add to cart
        $('.add_to_cart').click(function () {
            showLoader()
                @auth
            let id = $(this).attr('data-id')
            $.post("{{route('cart.store')}}",
                {
                    "_token": "{{ csrf_token() }}",
                    product_id: id,
                    quantity: 1
                },
                function(data, status){
                    hideLoader()
                    $('#cartCount').text(data)
                    toastr["success"]("product added to your cart")
                });
            @else
                return location = '{{route('login')}}'
            @endauth
        })
    </script>
@endsection
