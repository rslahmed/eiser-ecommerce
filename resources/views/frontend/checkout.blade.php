@extends('frontend.layout')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Product Checkout</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="checkout.html">Product Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Shipping Details</h3>
                        <form
                            class="row contact_form"
                            action="#"
                            method="post"
                            novalidate="novalidate"
                        >
                            <div class="col-md-12 form-group p_star">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="first"
                                    name="name"
                                />
                                <span
                                    class="placeholder"
                                    data-placeholder="Full name"
                                ></span>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="number"
                                    name="number"
                                />
                                <span
                                    class="placeholder"
                                    data-placeholder="Phone number"
                                ></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    name="compemailany"
                                />
                                <span
                                    class="placeholder"
                                    data-placeholder="Email Address"
                                ></span>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="add1"
                                    name="add1"
                                />
                                <span
                                    class="placeholder"
                                    data-placeholder="Address"
                                ></span>
                            </div>

                            <div class="col-md-12 form-group">
                                <textarea
                                    class="form-control"
                                    name="message"
                                    id="message"
                                    rows="1"
                                    placeholder="Order Notes"
                                ></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li>
                                    <a href="#"
                                    >Product
                                        <span>Total</span>
                                    </a>
                                </li>
                                @foreach($carts as $cart)
                                    <li>
                                        <a href="#">
                                            <span class="start">{{$cart->product->product_name}}</span>
                                            <span class="middle">x {{$cart->quantity}}</span>
                                            <span class="last">${{($cart->product->discount_price ?? $cart->product->selling_price) * $cart->quantity }}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="javascript:void(0)">Subtotal
                                        <span>${{$subTotal}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Shipping
                                        <span>${{$shippingCost}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Total
                                        <span>${{$subTotal + $shippingCost}}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="selector" />
                                    <label for="f-option5">Cash on delivery</label>
                                    <div class="check"></div>
                                </div>
                                <p>
                                    Please send a check to Store Name, Store Street, Store Town,
                                    Store State / County, Store Postcode.
                                </p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector" />
                                    <label for="f-option6">Paypal </label>
                                    <img src="img/product/single-product/card.jpg" alt="" />
                                    <div class="check"></div>
                                </div>
                                <p>
                                    Please send a check to Store Name, Store Street, Store Town,
                                    Store State / County, Store Postcode.
                                </p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector" />
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div>
                            <a class="main_btn" href="#">Proceed to Paypal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection
