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

    <section class="cat_product_area section_gap">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="product_top_bar">
                        <div class="left_dorp">
                            <select class="sorting">
                                <option value="1">Default sorting</option>
                                <option value="2">Default sorting 01</option>
                                <option value="4">Default sorting 02</option>
                            </select>
                            <select class="show">
                                <option value="1">Show 12</option>
                                <option value="2">Show 14</option>
                                <option value="4">Show 16</option>
                            </select>
                        </div>
                    </div>

                    <div class="latest_product_inner">
                        <div class="row">
{{--                            product--}}
                            @foreach($products as $row)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{route('product.view', $row->slug)}}">
                                            <img class="card-img" src="{{$row->image_one}}" alt="{{$row->product_name}}" />
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

                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <li>
                                        <a href="#">Frozen Fish</a>
                                    </li>
                                    <li>
                                        <a href="#">Dried Fish</a>
                                    </li>
                                </ul>
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Product Brand</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <li>
                                        <a href="#">Apple</a>
                                    </li>
                                    <li>
                                        <a href="#">Asus</a>
                                    </li>
                                </ul>
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Color Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <li>
                                        <a href="#">Black</a>
                                    </li>
                                    <li>
                                        <a href="#">Black Leather</a>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

@section('script')
    <script !src="">
        // add to cart
        $('.add_to_cart').click(function () {
            @auth
            let id = $(this).attr('data-id')
            $.post("{{route('cart.store')}}",
                {
                    "_token": "{{ csrf_token() }}",
                    product_id: id,
                    quantity: 1
                },
                function(data, status){
                    $('#cartCount').text(data)
                    alert('Product added to your cart')
                });
            @else
                return location = '{{route('login')}}'
            @endauth
        })
    </script>
@endsection
