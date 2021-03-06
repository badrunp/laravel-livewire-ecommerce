<div>
     <!-- mobile menu -->
     <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

    <!--header-->
    <header id="header" class="header header-style-1">
        <div class="container-fluid">
            <div class="row">
                <div class="topbar-menu-area">
                    <div class="container">
                        <div class="topbar-menu left-menu">
                            <ul>
                                <li class="menu-item">
                                    <a title="Hotline: (+123) 456 789" href="#"><span
                                            class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
                                </li>
                            </ul>
                        </div>
                        <div class="topbar-menu right-menu">
                            <ul>
                                <li class="menu-item lang-menu menu-item-has-children parent">
                                    <a title="English" href="#"><span class="img label-before"><img
                                                src="{{ asset('assets') }}/images/lang-en.png"
                                                alt="lang-en"></span>English<i class="fa fa-angle-down"
                                            aria-hidden="true"></i></a>
                                    <ul class="submenu lang">
                                        <li class="menu-item"><a title="hungary" href="#"><span
                                                    class="img label-before"><img
                                                        src="{{ asset('assets') }}/images/lang-hun.png"
                                                        alt="lang-hun"></span>Hungary</a></li>
                                        <li class="menu-item"><a title="german" href="#"><span
                                                    class="img label-before"><img
                                                        src="{{ asset('assets') }}/images/lang-ger.png"
                                                        alt="lang-ger"></span>German</a></li>
                                        <li class="menu-item"><a title="french" href="#"><span
                                                    class="img label-before"><img
                                                        src="{{ asset('assets') }}/images/lang-fra.png"
                                                        alt="lang-fre"></span>French</a></li>
                                        <li class="menu-item"><a title="canada" href="#"><span
                                                    class="img label-before"><img
                                                        src="{{ asset('assets') }}/images/lang-can.png"
                                                        alt="lang-can"></span>Canada</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children parent">
                                    <a title="Dollar (USD)" href="#">Dollar (USD)<i class="fa fa-angle-down"
                                            aria-hidden="true"></i></a>
                                    <ul class="submenu curency">
                                        <li class="menu-item">
                                            <a title="Pound (GBP)" href="#">Pound (GBP)</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Euro (EUR)" href="#">Euro (EUR)</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Dollar (USD)" href="#">Dollar (USD)</a>
                                        </li>
                                    </ul>
                                </li>
                                @if(Route::has('home.login'))
                                @auth
                                @if(auth()->user()->role == 'admin')
                                <li class="menu-item menu-item-has-children parent">
                                    <a title="{{ auth()->user()->name }}" href="#">{{ auth()->user()->name }}<i class="fa fa-angle-down"
                                            aria-hidden="true"></i></a>
                                    <ul class="submenu curency">
                                        <li class="menu-item">
                                            <a href="{{ route('admin.dashboard') }}" >Dashboard</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('admin.category') }}">Category</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('admin.product') }}">Product</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('admin.banner') }}">Banner</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('admin.sale') }}">Sale Info</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#" wire:click.prevent="logout">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                                @elseif(auth()->user()->role == 'user')
                                <li class="menu-item menu-item-has-children parent">
                                    <a title="{{ auth()->user()->name }}" href="#">{{ auth()->user()->name }}<i class="fa fa-angle-down"
                                            aria-hidden="true"></i></a>
                                    <ul class="submenu curency">
                                        <li class="menu-item">
                                            <a href="#" wire:click.prevent="logout">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                                @endif
                                @else
                                <li class="menu-item"><a title="Register or Login" href="{{ route('home.login') }}">Login</a></li>
                                @if(Route::has('home.register'))
                                <li class="menu-item"><a title="Register or Login" href="{{ route('home.register') }}">Register</a>
                                </li>
                                @endif
                                @endauth
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="mid-section main-info-area">

                        <div class="wrap-logo-top left-section">
                            <a href="index.html" class="link-to-home"><img
                                    src="{{ asset('assets') }}/images/logo-top-1.png" alt="mercado"></a>
                        </div>

                        <div class="wrap-search center-section">
                            <div class="wrap-search-form">
                                <form action="{{ route('home.search') }}" id="form-search-top" name="form-search-top">
                                    <input type="text" name="search" value="{{ $search }}" placeholder="Search here...">
                                    <button form="form-search-top" type="submit"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                    <div class="wrap-list-cate">
                                        <input type="hidden" name="product_cat" value="{{ $product_cat }}" id="product-cate">
                                        <input type="hidden" name="product_cat_id" value="{{ $product_cat_id }}" id="product-cate">
                                        <a href="#" class="link-control">{{ str_split($product_cat, 12)[0] }}</a>
                                        <ul class="list-cate">
                                            <li class="level-0">All Category</li>
                                            @foreach($categories as $key => $value)
                                            <li class="level-1" data-id="{{ $value->id }}">{{ $value->name }}</li>
                                            @endforeach 
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="wrap-icon right-section">
                            <div class="wrap-icon-section wishlist">
                                <a href="{{ route('home.wishlist') }}" class="link-direction">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    <div class="left-info">
                                        <span class="index">{{ Cart::instance('wishlist')->count() }} item</span>
                                        <span class="title">Wishlist</span>
                                    </div>
                                </a>
                            </div>
                            <div class="wrap-icon-section minicart">
                                <a href="{{ route('home.cart') }}" class="link-direction">
                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                    <div class="left-info">
                                        <span class="index">{{ Cart::instance('cart')->count() }} items</span>
                                        <span class="title">CART</span>
                                    </div>
                                </a>
                            </div>
                            <div class="wrap-icon-section show-up-after-1024">
                                <a href="#" class="mobile-navigation">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="nav-section header-sticky">
                    <div class="header-nav-section">
                        <div class="container">
                            <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info">
                                <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top new items</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span
                                        class="nav-label hot-label">hot</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="primary-nav-section">
                        <div class="container">
                            <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                                <li class="menu-item home-icon">
                                    <a href="index.html" class="link-term mercado-item-title"><i class="fa fa-home"
                                            aria-hidden="true"></i></a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('home.index') }}" class="link-term mercado-item-title">Home</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('home.shop') }}" class="link-term mercado-item-title">Shop</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('home.cart') }}" class="link-term mercado-item-title">Cart</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('home.checkout') }}"
                                        class="link-term mercado-item-title">Checkout</a>
                                </li>
                                <li class="menu-item">
                                    <a href="contact-us.html" class="link-term mercado-item-title">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
