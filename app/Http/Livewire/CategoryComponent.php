<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class CategoryComponent extends Component
{

    use WithPagination;
    public $numberPage = 12;
    public $sortingBy = 'defaul';
    public $category;

    public $min_price;
    public $max_price;

    protected $paginationTheme = 'bootstrap';

    public function mount(Category $category){
        $this->category = $category;

        $this->min_price = 1;
        $this->max_price = 10000;
    }

    public function store($id, $name, $price){
        Cart::instance('cart')->add($id, $name, 1, $price)->associate('App\Models\Product');
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
        if($this->sortingBy == 'date'){
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('category_id', $this->category->id)->orderBy('created_at', 'DESC')->paginate($this->numberPage);
        }else if($this->sortingBy == 'price'){
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('category_id', $this->category->id)->orderBy('regular_price', 'ASC')->paginate($this->numberPage);
        }else if($this->sortingBy == 'price-desc'){
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('category_id', $this->category->id)->orderBy('regular_price', 'DESC')->paginate($this->numberPage);
        }else{
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('category_id', $this->category->id)->paginate($this->numberPage);
        }

        return view('livewire.shop-component', [
            'products' => $products,
            'categories' => Category::all(),
            'sale' => Sale::first(),
            'myWishlist' => Cart::instance('wishlist')->content()->pluck('id')
        ])->layout('layouts.app-layout');
    }
}
