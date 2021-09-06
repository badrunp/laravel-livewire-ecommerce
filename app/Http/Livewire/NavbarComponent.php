<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NavbarComponent extends Component
{

    public function logout(){
        auth()->logout();

        session()->invalidate();

        session()->regenerateToken();
        return redirect()->route('home.index');
    }

    public function render()
    {
        return view('livewire.navbar-component');
    }
}
