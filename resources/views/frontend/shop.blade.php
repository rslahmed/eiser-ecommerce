@extends('frontend.layout')

@section('style')
    @livewireStyles
@endsection

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Shop anything</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="{{route('home')}}">Home</a>
                        <a href="#">Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->


    <livewire:shop />

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

