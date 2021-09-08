<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;

    protected $listeners = ['deleteProduct'];

    public function deleteProduct(Product $category){
        $category->delete();
        session()->flash('message', 'Success, Product deleted');
    }

    public function render()
    {
        return view('livewire.admin.admin-product-component', [
            'products' => Product::paginate(10)
        ])->layout('layouts.app-layout');
    }
}
