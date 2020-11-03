@extends('frontend.layout')

@section('content')

    <!--================Home Banner Area =================-->
    <section class="home_banner_area mb-40">
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

    {{--featured product area--}}
    @if(!empty($products))
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

            <div class="row featured_slider owl-carousel">

                @foreach($products as $row)
                    <div class="col-lg-12">
                        <div class="single-product">
                            <div class="product-img">
                                <img class="img-fluid w-100" src="{{asset($row->image_one)}}" alt="">
                                <div class="p_icon">
                                    <a href="">
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
                @endforeach

            </div>
        </div>
    </section>
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

    {{--new prodcut area--}}
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

            {{--        collection of year--}}
            <div class="row ">
                @if(!empty($products))
                <div class="col-lg-6 collection_oy owl-carousel">
                    @foreach($products as $row)
                    <div class="new_product">
                        <h5 class="text-uppercase">collection of 2019</h5>
                        <h3 class="text-uppercase">{{$row->product_name}}</h3>
                        <div class="product-img">
                            <img class="img-fluid" src="{{asset($row->image_one)}}" style="height: 300px; object-fit: contain">
                        </div>
                        <h4>{{$row->discount_price ?? $row->selling_price}}</h4>
                        <a href="" class="main_btn">View product</a>
                    </div>
                    @endforeach
                </div>
                @endif

                @if(!empty($products))
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="row">
                            @foreach($products as $row)
                            <div class="col-md-6">
                                <div class="single-product">
                                    <div class="product-img">
                                        <img class="img-fluid w-100" style="height: 280px; object-fit: contain" src="{{asset($row->image_one)}}" alt="">
                                        <div class="p_icon">
                                            <a href="">
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
                            @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    {{--    hot deal section--}}
    @if(!empty($products))
    <section class="inspired_product_area section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>Hot deal</span></h2>
                        <p>Bring called seed first of third give itself now ment</p>
                    </div>
                </div>
            </div>
            <div class="row hot_deal owl-carousel">
                    @foreach($products as $row)
                    <div class="col-lg-12">
                        <div class="single-product">
                            <div class="product-img">
                                <img class="img-fluid w-100" src="{{asset($row->image_one)}}" alt="">
                                <div class="p_icon">
                                    <a href="">
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
                    @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
