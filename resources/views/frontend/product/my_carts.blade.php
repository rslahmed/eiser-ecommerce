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
                        <a href="#">My Carts</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                @if($carts->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $cart)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{asset($cart->product->image_one)}}" class="single_cart_img" alt="" />
                                    </div>
                                    <div class="media-body">
                                        <p>{{$cart->product->product_name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>${{$cart->product->discount_price ?? $cart->product->selling_price}}</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input type="number" name="qty" id="sst-{{$cart->id}}"  maxlength="12" value="{{$cart->quantity}}" title="Quantity:" class="input-text qty appearance-none" />
                                    <button onclick="var result = document.getElementById('sst-{{$cart->id}}'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button" >
                                        <i class="lnr lnr-chevron-up"></i>
                                    </button>
                                    <button onclick="var result = document.getElementById('sst-{{$cart->id}}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;" class="reduced items-count" type="button" >
                                        <i class="lnr lnr-chevron-down"></i>
                                    </button>
                                </div>

                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5>${{($cart->product->discount_price ?? $cart->product->selling_price) * $cart->quantity }}</h5>
                                    <form action="{{route('cart.destroy', $cart->id)}}" method="post" onsubmit="return confirm('Are you sure')">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger d-block" title="Remove this item"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>${{$subTotal}}</h5>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Shipping</h5>
                            </td>
                            <td>
                                <h5> $5 </h5>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Total</h5>
                            </td>
                            <td>
                                <h5>${{$subTotal + 5}}</h5>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="checkout_btn_inner text-right">
                                    <a class="main_btn" href="#">Proceed to checkout</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                @else
                    <h5>You have no items here. <a href="{{route('home')}}">Continue shopping</a></h5>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script !src="">

    </script>
@endsection
