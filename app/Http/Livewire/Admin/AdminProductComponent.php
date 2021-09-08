<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;

    protected $listeners = ['deleteProduct'];

    public function deleteProduct(Product $product){
        $product->delete();
        if(Storage::exists($product->image)){
            Storage::delete($product->image);
        }
        session()->flash('message', 'Success, Product deleted');
    }

    public function render()
    {
        return view('livewire.admin.admin-product-component', [
            'products' => Product::latest()->paginate(10)
        ])->layout('layouts.app-layout');
    }
}
