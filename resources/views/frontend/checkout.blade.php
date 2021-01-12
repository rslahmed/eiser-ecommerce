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
                        <a href="{{route('home')}}">Home</a>
                        <a href="#">Product Checkout</a>
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
                            action="{{route('address.store')}}"
                            method="post"
                            novalidate="novalidate"
                            id="shippingAdrForm"
                        >
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    id="name"
                                    placeholder="Full name"
                                    value="{{auth()->user()->name}}"
                                    readonly
                                />
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    id="email"
                                    placeholder="Email address"
                                    value="{{auth()->user()->email}}"
                                    readonly
                                />
                            </div>

                            <div class="col-md-12 form-group p_star mb-1">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="number"
                                    id="number"
                                    placeholder="Number"
                                    @if(!empty(auth()->user()->shippingAddress))
                                        value="{{auth()->user()->shippingAddress->number}}"
                                        readonly
                                    @endif
                                />
                            </div>

                            <div class="col-md-12 form-group">
                                <textarea
                                    class="form-control text-left"
                                    name="address"
                                    id="address"
                                    rows="1"
                                    placeholder="Address"
                                    @if(!empty(auth()->user()->shippingAddress))
                                        readonly
                                    @endif
                                >@if(!empty(auth()->user()->shippingAddress)){{auth()->user()->shippingAddress->address}}@endif</textarea>
                            </div>

                        @if(!empty(auth()->user()->shippingAddress))
                            <div class="mt-1 ml-3">
                                <a href="#"> <i class="fa fa-edit"></i> Change shipping address</a>
                            </div>
                            @else
                            <button type="submit" class=" main_btn ml-3">Save</button>
                        @endif
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
                                            <span class="last">${{$cart->product->selling_price * $cart->quantity }}</span>
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
                            @if(!empty(auth()->user()->shippingAddress))
                            <div class="creat_account mt-3">
                                <input type="checkbox" id="f-option4" name="selector" />
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div>
                            <button class="main_btn w-100" id="paymentButton">Proceed to pay</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select a payment method</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('order.store')}}" method="post" id="cashForm">
                        <input type="hidden" name="payment_type" id="payment_type" value="cash">
                        <input type="hidden" name="payment_id" id="payment_id" value="">
                        @csrf

                        <button type="submit" class="main_btn w-100" id="cashOn">Cash on delivery</button>
                    </form>
                    <div class="mt-3" id="paypal-button">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://www.paypal.com/sdk/js?client-id=AR_eAC7YK5Sv6NxynCkrY7aMEwPR9BwoFLMbYYTuVx4iv4vTNzFtuJVDqJjtXJgCnjE80AdriYmtx4ry&currency=USD" data-sdk-integration-source="button-factory"></script>
    <script>
        function initPayPalButton() {
            paypal.Buttons({
                style: {
                    shape: 'rect',
                    color: 'blue',
                    layout: 'vertical',
                    label: 'paypal',
                },

                createOrder: function(data, actions) {
                    showLoader();
                    return actions.order.create({
                        purchase_units: [{
                            "amount":
                                {
                                    "currency_code":"USD",
                                    "value": {{$subTotal + $shippingCost}}
                                }
                            }]
                    });
                },

                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        let postData = {
                            amount:details.purchase_units[0].amount.value,
                            payer_email: details.payer.email_address,
                            status:details.status,
                            payer_id:details.payer.payer_id,
                            payment_id:details.id,
                            payer_name: details.payer.name.given_name+" "+details.payer.name.surname,
                            _token:'{{csrf_token()}}'
                        };

                        console.log(postData);
                        // payment
                        $.ajax({
                            url:'{{ route('payment') }}',
                            type: 'POST',  // http method
                            data: postData,  // data to submit
                            success: function (data, status, xhr) {
                                if(status == 'success'){
                                    $('#payment_type').val('paypal');
                                    $('#payment_id').val(data);
                                    $('#cashForm').submit();
                                }
                            },
                            error: function (jqXhr, textStatus, errorMessage) {
                                console.log('Error' + errorMessage);
                            }
                        });
                    });
                },

                onError: function(err) {
                    console.log(err);
                }
            }).render('#paypal-button');
        }


        let paymentInit = false
        $('#paymentButton').click(function () {
            $('#paymentModal').modal('show')
            if(paymentInit === false){
                initPayPalButton();
                paymentInit = true
            }
        })

        $('#cashOn').click(function (e) {
            showLoader();
        })
        $('#shippingAdrForm').on('submit', function () {
            showLoader();
        })
    </script>
@endsection

