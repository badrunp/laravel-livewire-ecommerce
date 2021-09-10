<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{

    public function store($id, $name, $price, $rowId){

        Cart::instance('cart')->add($id, $name, 1, $price)->associate('App\Models\Product');
        Cart::instance('wishlist')->remove($rowId);
        session()->flash('message', 'Item added in cart');
        return redirect()->route('home.cart');
    }

    public function addToWishlist($id, $name, $price, $type){
        if($type == 'add'){
            Cart::instance('wishlist')->add($id, $name, 1, $price)->associate('App\Models\Product');
        }else if($type == 'remove'){
            foreach(Cart::instance('wishlist')->content() as $data){
                if($data->id == $id){
                    Cart::instance('wishlist')->remove($data->rowId);
                }
            }
        }else{
            abort(404);
        }
        $this->emit('updateCount');
    }  

    public function render()
    {
        return view('livewire.wishlist-component', [
            'sale' => Sale::first(),
            'myWishlist' => Cart::instance('wishlist')->content()->pluck('id')
        ])->layout('layouts.app-layout');
    }
}
