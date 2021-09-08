<?php

namespace App\Http\Livewire\Admin;

use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminStoreBannerComponent extends Component
{
    use WithFileUploads;

    public $type = 'Created';
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $newImage;
    public $banner; 

    public function mount(Banner $banner){
        if(count($banner->toArray()) > 0){
            $this->type = 'Updated';
            $this->banner = $banner;
            $this->title = $banner->title;
            $this->subtitle = $banner->subtitle;
            $this->price = $banner->price;
            $this->link = $banner->link;
            $this->image = $banner->image;
        }
    }

    public function rules(){
        if($this->type == 'Updated'){
            return [
                'title' => 'required|min:3|max:100',
                'subtitle' => 'required',
                'price' => 'required',
                'link' => 'required',
            ];
        }
        return [
            'title' => 'required|min:3|max:100',
            'subtitle' => 'required',
            'price' => 'required',
            'link' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif'
        ];
    }

    public function store(){
        $input = $this->validate();

        if($this->type == 'Updated'){
            if($this->newImage){
                $input['image'] = $this->newImage->store('images/banners');
                if(Storage::exists($this->image)){
                    Storage::delete($this->image);
                }
            }
            $this->banner->update($input);
        }else{
            $input['image'] = $this->image->store('images/banners');
            Banner::create($input);
        }

        session()->flash('message', 'Success, ' . $this->type . ' product successfuly');
        return redirect()->route('admin.banner');
    }

    public function render()
    {
        return view('livewire.admin.admin-store-banner-component')->layout('layouts.app-layout');
    }
}
