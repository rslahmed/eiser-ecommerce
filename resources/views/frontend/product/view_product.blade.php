@extends('frontend.layout')

@section('content')

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Product Details</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="{{route('home')}}">Home</a>
                        <a href="#">Product Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Single Product Area =================-->
    <div class="product_image_area pb-5 mb-5">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_product_img">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators sproduct_small-image">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                    <img src="{{$product->image_one}}" alt="">
                                </li>
                                @if(!empty($product->image_two))
                                <li data-target="#carouselExampleIndicators" data-slide-to="1" class="">
                                    <img src="{{$product->image_two}}" alt="">
                                </li>
                                @endif
                                @if(!empty($product->image_three))
                                <li data-target="#carouselExampleIndicators" data-slide-to="2" class="">
                                    <img src="{{$product->image_three}}" alt="">
                                </li>
                                @endif
                            </ol>
                            <div class="carousel-inner sproduct_big-image">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{$product->image_one}}" alt="First slide">
                                </div>
                                @if(!empty($product->image_two))
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{$product->image_two}}" alt="Second slide">
                                </div>
                                @endif
                                @if(!empty($product->image_three))
                                <div class="carousel-item ">
                                    <img class="d-block w-100" src="{{$product->image_three}}" alt="Third slide">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{$product->product_name}}</h3>
                        <h2>
                            ${{$product->selling_price}}
                        @if(!empty($product->before_price))
                            <small class="text-muted">${{$product->before_price}}</small>
                        @endif
                        </h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="#"><span>Category</span> : {{$product->category->name}}</a>
                            </li>
                            <li>
                                <a href="#"> <span>Availibility</span> : @if($product->product_quantity > 0 && $product->product_quantity > 10) In Stock @elseif($product->product_quantity <= 10 && $product->product_quantity > 0) Almost sold out! @else Out of stock @endif</a>
                            </li>
                        </ul>
                        <div class="my-3">{!! $product->product_details !!}</div>

                        <div class="card_area">
                            <a class="main_btn" id="addToCart" href="javascript:void(0)">Add to Cart</a>
                            <a class="icon_btn" href="javascript:void(0)">
                                <i class="lnr lnr lnr-heart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->
@endsection

@section('script')
    <script !src="">
        $('#addToCart').click(function(){
            @auth
            let quantity = parseInt($('#quantity').val());
            $.post("{{route('cart.store')}}",
                {
                    "_token": "{{ csrf_token() }}",
                    product_id: '{{$product->id}}',
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
