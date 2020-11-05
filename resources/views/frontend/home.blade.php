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

    {{--product area--}}
    @if(!empty($products) && !empty($tags))
        @foreach($tags as $tag)
        <section class="feature_product_area section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>{{$tag->tag_name}}</span></h2>
                    </div>
                </div>
            </div>

            <div class="row featured_slider owl-carousel">

                @foreach($products as $row)
                    @if(in_array($tag->id,json_decode($row->tag_id)))
                    <div class="col-lg-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{route('product.view', $row->slug)}}">
                                    <img class="img-fluid w-100" src="{{asset($row->image_one)}}" alt="">
                                </a>
                                <div class="p_icon">
                                    <a href="{{route('product.view', $row->slug)}}">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-heart"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-btm">
                                <a href="#" class="d-block">
                                    <h4>{{$row->product_name}}</h4>
                                </a>
                                <div class="mt-3">
                                    @if(!empty($row->selling_price))
                                        <span class="mr-4">${{$row->discount_price}}</span>
                                        <del>${{$row->selling_price}}</del>
                                    @else
                                        <span class="mr-4">${{$row->selling_price}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach

            </div>
        </div>
    </section>
        @endforeach
    @endif

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
@endsection
