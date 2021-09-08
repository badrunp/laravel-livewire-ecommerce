<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AdminStoreProductComponent extends Component
{
    use WithFileUploads;

    public $product;
    public $type = 'Created';
    public $name;
    public $slug;
    public $regular_price;
    public $sale_price;
    public $short_description;
    public $description;
    public $quantity;
    public $stock_status = 'instock ';
    public $featured;
    public $SKU;
    public $image;
    public $category_id;
    public $newImage;

    public function mount(Product $product){
        if(count($product->toArray()) > 0){
            $this->type = 'Updated';
            $this->product = $product;
            $this->name = $product->name;
            $this->slug = $product->slug;
            $this->regular_price = $product->regular_price;
            $this->sale_price = $product->sale_price;
            $this->short_description = $product->short_description;
            $this->description = $product->description;
            $this->quantity = $product->quantity;
            $this->stock_status = $product->stock_status;
            $this->featured = $product->featured;
            $this->SKU = $product->SKU;
            $this->image = $product->image;
            $this->category_id = $product->category_id;
        }
    }

    public function rules(){

        if($this->type == 'Updated'){
            return [
                'name' => 'required|min:3|max:100|unique:products,name,' . $this->product->id,
                'slug' => 'required|unique:products,slug,' . $this->product->id,
                'regular_price' => 'required',
                'short_description' => 'required',
                'description' => 'required',
                'quantity' => 'required',
                'stock_status' => 'required',
                'featured' => 'required',
                'SKU' => 'required',
                'category_id' => 'required',
            ];
        }

        return [
            'name' => 'required|min:3|max:100|unique:products,name',
            'slug' => 'required|unique:products,slug',
            'regular_price' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'SKU' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif',
            'category_id' => 'required',
        ];
    }

    public function updatedName(){
        $this->slug = Str::slug($this->name);
    }

    public function store(){
        $input = $this->validate();
        $input['sale_price'] = $this->sale_price;
        
        if($this->type == 'Updated'){
            if($this->newImage){
                $input['image'] = $this->newImage->store('images/products');
                if(Storage::exists($this->image)){
                    Storage::delete($this->image);
                }
            }
            $this->product->update($input);
        }else{
            $input['image'] = $this->image->store('images/products');
            Product::create($input);
        }

        session()->flash('message', 'Success, ' . $this->type . ' product successfuly');
        return redirect()->route('admin.product');
    }

    public function render()
    {
        return view('livewire.admin.admin-store-product-component', [
            'categories' => Category::all()
        ])->layout('layouts.app-layout');
    }
}
