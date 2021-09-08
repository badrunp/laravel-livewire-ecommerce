<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminStoreCategoryComponent extends Component
{

    public $name;
    public $slug;
    public $category;
    public $type = 'Created';

    public function rules(){
        if($this->type == 'Updated'){
            return [
                'name' => 'required|min:3|max:100|unique:categories,name,' . $this->category->id,
                'slug' => 'required|unique:categories,slug,' . $this->category->id 
            ];
        }
        return [
            'name' => 'required|min:3|max:100|unique:categories,name',
            'slug' => 'required|unique:categories,slug' 
        ];
    }

    public function mount(Category $category){
        if(count($category->toArray()) > 0){
            // dd($category); 
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->category = $category;
            $this->type = 'Updated';
        }   
    }

    public function updatedName(){
        $this->slug = Str::slug($this->name);
    }

    public function store(){
        $this->validate();

        if($this->type == 'Updated'){
            $this->category->update([
                'name' => $this->name,
                'slug' => $this->slug   
            ]);
        }else{
            Category::create([
                'name' => $this->name,
                'slug' => $this->slug
            ]);
        }

        session()->flash('message', 'Success, ' . $this->type . ' category successfuly');
        return redirect()->route('admin.category');
    }

    public function render()
    {
        return view('livewire.admin.admin-store-category-component')->layout('layouts.app-layout');
    }
}
