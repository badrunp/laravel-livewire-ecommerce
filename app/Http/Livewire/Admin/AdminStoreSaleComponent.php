<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class AdminStoreSaleComponent extends Component
{
    public $sale_date;
    public $status;
    public $sale;

    public function mount(Sale $sale){
        $this->sale = $sale;
        $this->sale_date = $sale->sale_date;
        $this->status = $sale->status;
    }

    public function rules(){
        return [
            'status' => 'required',
            'sale_date' => 'required'
        ];
    }

    public function store(){
        $input = $this->validate();

        $this->sale->update($input);

        session()->flash('message', 'Success, Update sale successfuly');
        return redirect()->route('admin.sale');
    }

    public function render()
    {
        return view('livewire.admin.admin-store-sale-component')->layout('layouts.app-layout');
    }
}
