<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;

    public function store($id, $name, $price){
        Cart::add($id, $name, 1, $price)->associate('App\Models\Product');
        session()->flash('message', 'Item added in cart');
        return redirect()->route('home.cart');
    }

    public function render()
    {
        return view('livewire.shop-component', [
            'products' => Product::paginate(12)
        ])->layout('layouts.app-layout');
    }
}
