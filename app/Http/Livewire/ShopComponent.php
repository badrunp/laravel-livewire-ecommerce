<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;
    public $numberPage = 12;
    public $sortingBy = 'defaul';

    protected $paginationTheme = 'bootstrap';

    public function store($id, $name, $price){
        Cart::add($id, $name, 1, $price)->associate('App\Models\Product');
        session()->flash('message', 'Item added in cart');
        return redirect()->route('home.cart');
    }

    public function render()
    {
        if($this->sortingBy == 'date'){
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->numberPage);
        }else if($this->sortingBy == 'price'){
            $products = Product::orderBy('regular_price', 'ASC')->paginate($this->numberPage);
        }else if($this->sortingBy == 'price-desc'){
            $products = Product::orderBy('regular_price', 'DESC')->paginate($this->numberPage);
        }else{
            $products = Product::paginate($this->numberPage);
        }

        return view('livewire.shop-component', [
            'products' => $products,
            'categories' => Category::all()
        ])->layout('layouts.app-layout');
    }
}
