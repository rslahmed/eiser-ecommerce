<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    function index(){
        return view('frontend.product.my_carts');
    }

    function store(Request $request){
        $request->validate([
            'quantity' => 'required|integer',
            'product_id' => 'required'
        ]);

        $oldData = Cart::where('user_id', auth()->id())->where('product_id', $request->product_id)->first();
        if($oldData){
            Cart::find($oldData->id)->update([
                'quantity' => $oldData->quantity + $request->quantity
            ]);
        }else{
            $data = Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'size' => $request->size ?? '',
                'color' => $request->color ?? '',
            ]);
        }

        $cartCount = Cart::where('user_id', auth()->id())->get()->count();
        return response($cartCount, '200');
    }

    function destroy($id){
        Cart::find($id)->delete();
        return back()->with('success', 'Cart is removed');
    }
}
