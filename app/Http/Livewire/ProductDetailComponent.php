<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class ProductDetailComponent extends Component
{
    public $product;
    public $qty = 1;

    public function mount(Product $product){
        $this->product = $product;
    }

    public function store($id, $name, $price){
        Cart::add($id, $name, $this->qty, $price)->associate('App\Models\Product');
        session()->flash('message', 'Item added in cart');
        return redirect()->route('home.cart');
    }

    public function increment(){
        $this->qty = $this->qty + 1;
    }

    public function decrement(){
        if($this->qty == 1){
            return;
        }
        $this->qty = $this->qty - 1;
    }

    public function render()
    {
        return view('livewire.product-detail-component', [
            'productPopulars' => Product::inRandomOrder()->limit(4)->get(),
            'productRelateds' => Product::where('category_id', $this->product->category_id)->inRandomOrder()->limit(5)->get()
        ])->layout('layouts.app-layout');
    }
}
