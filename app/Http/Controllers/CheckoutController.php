<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', auth()->id())->get();
        $shippingCost = 5;
        $subTotal = 0;
        foreach ($carts as $cart){
            $subprice = $cart->product->discount_price ?? $cart->product->selling_price;
            $price = $subprice * $cart->quantity;
            $subTotal += $price;
        }
        return view('frontend.checkout', compact('carts', 'subTotal', 'shippingCost'));
    }
}
