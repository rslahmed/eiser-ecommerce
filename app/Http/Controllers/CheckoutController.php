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

    public function payment(Request $request)
    {
        Payment::create([
           'user_id' => auth()->user()->id,
            'order_id' => $request->order_id,
            'payment_id' => $request->payment_id,
            'payer_id' => $request->payer_id,
            'payer_name' => $request->payer_name,
            'payer_email' => $request->payer_email,
            'amount' => $request->amount,
            'status' => $request->status,
        ]);
    }
}
