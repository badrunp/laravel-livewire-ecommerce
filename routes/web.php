<?php

use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\LoginComponent;
use App\Http\Livewire\RegisterComponent;
use App\Http\Livewire\ShopComponent;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;

Route::name('home.')->group(function () {
    Route::get('/', HomeComponent::class)->name('index');
    Route::get('/cart', CartComponent::class)->name('cart');
    Route::get('/shop', ShopComponent::class)->name('shop');
    Route::get('/checkout', CheckoutComponent::class)->name('checkout');

    Route::middleware(['guest'])->group(function(){
        Route::get('/login', LoginComponent::class)->name('login');
        Route::get('/register', RegisterComponent::class)->name('register');
    });
});

