<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class CategoryComponent extends Component
{

    use WithPagination;
    public $numberPage = 12;
    public $sortingBy = 'defaul';
    public $category;

    protected $paginationTheme = 'bootstrap';

    public function mount(Category $category){
        $this->category = $category;
    }

    public function store($id, $name, $price){
        Cart::add($id, $name, 1, $price)->associate('App\Models\Product');
        session()->flash('message', 'Item added in cart');
        return redirect()->route('home.cart');
    }

    public function render()
    {
        if($this->sortingBy == 'date'){
            $products = Product::orderBy('created_at', 'DESC')->where('category_id', $this->category->id)->paginate($this->numberPage);
        }else if($this->sortingBy == 'price'){
            $products = Product::where('category_id', $this->category->id)->orderBy('regular_price', 'ASC')->paginate($this->numberPage);
        }else if($this->sortingBy == 'price-desc'){
            $products = Product::where('category_id', $this->category->id)->orderBy('regular_price', 'DESC')->paginate($this->numberPage);
        }else{
            $products = Product::where('category_id', $this->category->id)->paginate($this->numberPage);
        }

        return view('livewire.shop-component', [
            'products' => $products,
            'categories' => Category::all()
        ])->layout('layouts.app-layout');
    }
}
