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
                                    <h5>${{$cart->product->selling_price}}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="number" readonly name="qty" id="sst-{{$cart->id}}"  maxlength="12" value="{{$cart->quantity}}" title="Quantity:" class="input-text qty appearance-none" />
                                        <button  class="increase items-count" type="button" wire:click="cartIncreament({{$cart->id}})">
                                            <i class="lnr lnr-chevron-up"></i>
                                        </button>
                                        <button class="reduced items-count" type="button" wire:click="cartDecreament({{$cart->id}})">
                                            <i class="lnr lnr-chevron-down"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5>${{$cart->product->selling_price * $cart->quantity }}</h5>
                                        <button type="submit" class="btn btn-sm btn-danger d-block" title="Remove this item" wire:click="destroy({{$cart->id}})"><i class="fa fa-trash"></i></button>
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
                                <h5> ${{$shippingCost}} </h5>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Total</h5>
                            </td>
                            <td>
                                <h5>${{$subTotal + $shippingCost}}</h5>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="checkout_btn_inner text-right">
                                    <a class="main_btn" href="{{route('checkout')}}">Proceed to checkout</a>
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
