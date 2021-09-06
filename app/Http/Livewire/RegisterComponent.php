<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class RegisterComponent extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirm_password;

    public function rules(){
        return [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'confirm_password' => 'required|same:password|min:6|max:100',
        ];
    }

    protected $validationAttributes = [
        'confirm_password' => 'password',
        'password' => 'confirm password'
    ];

    public function store(){
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => 'user'
        ]);

        auth()->login($user);
        
        return redirect()->route('home.index');
    }

    public function render()
    {
        return view('livewire.register-component')->layout('layouts.app-layout');
    }
}
