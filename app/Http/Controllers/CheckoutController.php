<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', auth()->id())->get();
        $shippingCost = 5;
        $subTotal = 0;
        foreach ($carts as $cart){
            $subprice = $cart->product->selling_price;
            $price = $subprice * $cart->quantity;
            $subTotal += $price;
        }
        return view('frontend.checkout', compact('carts', 'subTotal', 'shippingCost'));
    }

}
