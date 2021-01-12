<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('frontend.orders', compact('orders'));
    }

    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $prodcuts = Cart::where('user_id', $userId)->get();
        $product_detials = [];
        foreach ($prodcuts as $prodcut){
            $data = [];
            $data['product_id'] = $prodcut->product->id;
            $data['product_slug'] = $prodcut->product->slug;
            $data['product_name'] = $prodcut->product->product_name;
            $data['product_image'] = $prodcut->product->image_one;
            $data['quantity'] = $prodcut->quantity;
            $data['price'] = $prodcut->product->selling_price;
            array_push($product_detials, $data);
        }

        $paymentId = $request->payment_id ?? null;
        $data = [
            'user_id' => $userId,
            'payment_type' => $request->payment_type,
            'payment_id' => $paymentId,
            'status' => $request->payment_id ? 'paid' : 'unpaid',
            'product_details' => json_encode($product_detials)
        ];

        $create = Order::create($data);
        if($create){
            Cart::where('user_id', $userId)->delete();
        }

        return redirect()->route('orders');
    }
}
