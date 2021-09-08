<?php

namespace App\Http\Livewire\Admin;

use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBannerComponent extends Component
{
    use WithPagination;

    protected $listeners = ['deleteBanner'];

    public function deleteBanner(Banner $banner){
        $banner->delete();
        if(Storage::exists($banner->image)){
            Storage::delete($banner->image);
        }
        session()->flash('message', 'Success, Banner deleted');
    }

    public function updateStatus(Banner $banner){
        $banner->update([
            'status' => $banner->status == 'active' ? 'unactive' : 'active'
        ]);

        session()->flash('message', 'Success, Banner status updated');

    }

    public function render()
    {
        return view('livewire.admin.admin-banner-component', [
            'banners' => Banner::paginate(10)
        ])->layout('layouts.app-layout');
    }
}
