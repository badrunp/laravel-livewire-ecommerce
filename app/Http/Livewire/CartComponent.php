<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increment($rowId)
    {
        $cart = Cart::instance('cart')->get($rowId);
        $qty = $cart->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emit('updateCount');
    }

    public function decrement($rowId)
    {
        $cart = Cart::instance('cart')->get($rowId);
        if ($cart->qty == 1) {
            return;
        }

        $qty = $cart->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emit('updateCount');
    }

    public function removeCart($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emit('updateCount');
        session()->flash('message', 'Item has been removed');
    }

    public function removeAllCart()
    {
        if (Cart::instance('cart')->count() > 0) {
            Cart::instance('cart')->destroy();
            $this->emit('updateCount');
            session()->flash('message', 'Cart item is deleted all success');
        }

        return;
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.app-layout');
    }
}
