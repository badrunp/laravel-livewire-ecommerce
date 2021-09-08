<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class SearchComponent extends Component
{
    use WithPagination;
    public $numberPage = 12;
    public $sortingBy = 'defaul';
    public $category;
    public $search;
    public $product_cat;
    public $product_cat_id;

    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->category = Category::find(request()->query('product_cat_id'));
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
    }

    public function store($id, $name, $price){
        Cart::add($id, $name, 1, $price)->associate('App\Models\Product');
        session()->flash('message', 'Item added in cart');
        return redirect()->route('home.cart');
    }

    public function render()
    {
        // dd($this->category);
        if($this->sortingBy == 'date'){
            $products = Product::when($this->category, function($query, $category){
                return $query->where('category_id', $category->id);
            })->where('name', 'like', '%'. $this->search .'%')->orderBy('created_at', 'DESC')->paginate($this->numberPage);
        }else if($this->sortingBy == 'price'){
            $products = Product::when($this->category, function($query, $category){
                return $query->where('category_id', $category->id);
            })->where('name', 'like', '%'. $this->search .'%')->orderBy('regular_price', 'ASC')->paginate($this->numberPage);
        }else if($this->sortingBy == 'price-desc'){
            $products = Product::when($this->category, function($query, $category){
                return $query->where('category_id', $category->id);
            })->where('name', 'like', '%'. $this->search .'%')->orderBy('regular_price', 'DESC')->paginate($this->numberPage);
        }else{
            $products = Product::when($this->category, function($query, $category){
                return $query->where('category_id', $category->id);
            })->where('name', 'like', '%'. $this->search .'%')->paginate($this->numberPage);
        }

        return view('livewire.shop-component', [
            'products' => $products,
            'categories' => Category::all()
        ])->layout('layouts.app-layout');
    }
}
