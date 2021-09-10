<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class NavbarComponent extends Component
{

    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount(){
        $this->product_cat = 'All Category';
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
    }

    protected $listeners = ['updateCount' => '$refresh'];


    public function logout(){
        auth()->logout();

        session()->invalidate();

        session()->regenerateToken();
        return redirect()->route('home.index');
    }

    public function render()
    {
        return view('livewire.navbar-component', [
            'categories' => Category::all()
        ]);
    }
}
