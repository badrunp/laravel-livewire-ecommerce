<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class AdminSaleComponent extends Component
{

    public function updateStatus(Sale $sale){
        $sale->update([
            'status' => $sale->status == 'active' ? 'unactive' : 'active'
        ]);

        session()->flash('message', 'Success, Sale status updated');
    }

    public function render()
    {
        return view('livewire.admin.admin-sale-component', [
            'sale' => Sale::find(1)
        ])->layout('layouts.app-layout');
    }
}
