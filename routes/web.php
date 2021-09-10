<?php

use App\Http\Livewire\Admin\AdminBannerComponent;
use App\Http\Livewire\Admin\AdminStoreCategoryComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\AdminStoreBannerComponent;
use App\Http\Livewire\Admin\AdminStoreProductComponent;
use App\Http\Livewire\Admin\AdminStoreSaleComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\LoginComponent;
use App\Http\Livewire\ProductDetailComponent;
use App\Http\Livewire\RegisterComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\WishlistComponent;
use Illuminate\Support\Facades\Route;

Route::name('home.')->group(function () {
    Route::get('/', HomeComponent::class)->name('index');
    Route::get('/cart', CartComponent::class)->name('cart');
    Route::get('/wishlist', WishlistComponent::class)->name('wishlist');
    Route::get('/shop', ShopComponent::class)->name('shop');
    Route::get('/checkout', CheckoutComponent::class)->name('checkout');
    Route::get('/search', SearchComponent::class)->name('search');
    Route::get('/category/{category:slug}', CategoryComponent::class)->name('category');
    
    Route::middleware(['guest'])->group(function(){
        Route::get('/login', LoginComponent::class)->name('login');
        Route::get('/register', RegisterComponent::class)->name('register');
    });

    Route::get('/{product:slug}', ProductDetailComponent::class)->name('productdetail');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'authadmin'])->group(function(){
    Route::get('/dashboard', AdminDashboardComponent::class)->name('dashboard');
    Route::get('/category', AdminCategoryComponent::class)->name('category');
    Route::get('/category/store/{category:slug?}', AdminStoreCategoryComponent::class)->name('store.category');
    Route::get('/product', AdminProductComponent::class)->name('product');
    Route::get('/product/store/{product:slug?}', AdminStoreProductComponent::class)->name('store.product');
    Route::get('/banner', AdminBannerComponent::class)->name('banner');
    Route::get('/banner/store/{banner?}', AdminStoreBannerComponent::class)->name('store.banner');
    Route::get('/sale', AdminSaleComponent::class)->name('sale');
    Route::get('/sale/store/{sale}', AdminStoreSaleComponent::class)->name('store.sale');
});
