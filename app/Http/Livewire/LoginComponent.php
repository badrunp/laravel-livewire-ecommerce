<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginComponent extends Component
{

    public $email;
    public $password;
    public $remember;

    public function rules(){
        return [
            'email' => 'required|email',
            'password' => 'required|min:6|max:100'
        ];
    }

    public function store(){
        $this->validate();

        if(auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)){
            session()->regenerate();

            return redirect()->intended('/');
        }

        $this->reset(['email', 'password']);
        session()->flash('error-login', 'Credential is invalid check your again!');
        return back();
    }

    public function render()
    {
        return view('livewire.login-component')->layout('layouts.app-layout');
    }
}
