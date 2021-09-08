<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    protected $listeners = ['deleteCategory'];


    public function deleteCategory(Category $category){
        $category->delete();
        if(Storage::exists($product->image)){
            Storage::delete($product->image);
        }
        session()->flash('message', 'Success, Category deleted');
    }

    public function render()
    {
        return view('livewire.admin.admin-category-component', [
            'categories' => Category::paginate(10)
        ])->layout('layouts.app-layout');;
    }
}
