<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class ShoppingCart extends Component
{
    public $carts;
    public $subTotal;
    public $shippingCost = 5;

    public function render()
    {
        return view('livewire.shopping-cart');
    }

    public function mount()
    {
        $this->getCarts();
    }

    public function cartIncreament($id)
    {
        $cart = Cart::find($id);
        $quantity = $cart->quantity;
        $cart->update([
           'quantity' => $quantity+1
        ]);
        $this->getCarts();
    }

    public function cartDecreament($id)
    {
        $cart = Cart::find($id);
        $quantity = $cart->quantity;
        if($quantity <=1){
            return ;
        }
        $cart->update([
           'quantity' => $quantity-1
        ]);
        $this->getCarts();
    }

    function destroy($id){
        Cart::find($id)->delete();
        $this->getCarts();
    }

    public function getCarts()
    {
        $this->carts = Cart::where('user_id', auth()->id())->get();
        $this->subTotal = 0;
        foreach ($this->carts as $cart){
            $subprice = $cart->product->discount_price ?? $cart->product->selling_price;
            $price = $subprice * $cart->quantity;
            $this->subTotal += $price;
        }
    }

}
