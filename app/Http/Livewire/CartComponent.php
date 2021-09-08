<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increment($rowId)
    {
        $cart = Cart::get($rowId);
        $qty = $cart->qty + 1;
        Cart::update($rowId, $qty);
    }

    public function decrement($rowId)
    {
        $cart = Cart::get($rowId);
        if ($cart->qty == 1) {
            return;
        }

        $qty = $cart->qty - 1;
        Cart::update($rowId, $qty);
    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        session()->flash('message', 'Item has been removed');
    }

    public function removeAllCart()
    {
        if (Cart::count() > 0) {
            Cart::destroy();
            session()->flash('message', 'Cart item is delete all success');
        }

        return;
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.app-layout');
    }
}
