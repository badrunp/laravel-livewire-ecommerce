<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $categories = [];
        foreach(Category::with('products')->limit(5)->get() as $category){
            if($category->products->count() > 0){
                $categories[] = $category;
            }
        }

        return view('livewire.home-component', [
            'banners' => Banner::where('status', 1)->get(),
            'categories' => collect($categories),
            'sales_products' => Product::where('sale_price', '>', 0)->limit(8)->get(),
            'sale' => Sale::first()
        ])->layout('layouts.app-layout');
    }
}
