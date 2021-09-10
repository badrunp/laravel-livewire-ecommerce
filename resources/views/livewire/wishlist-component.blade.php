@push('styles')
<style>
    .product-wish {
        position: absolute;
        top: 10%;
        left: 0;
        z-index: 99;
        right: 30px;
        text-align: right;
        padding-top: 0;
    }

    .product-wish .fa{
        color: #cbcbcb;
        font-size: 28px;
    }

    .product-wish .fa:hover{
        color: #ff7007;
    }
</style>
@endpush

<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>My Wishlist</span></li>
            </ul>
        </div>
        <div class="row">
            <ul class="product-list grid-products equal-container">
                @forelse(Cart::instance('wishlist')->content() as $key => $value)
                <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                    <div class="product product-style-3 equal-elem ">
                        <div class="product-thumnail">
                            <a href="{{ route('home.productdetail', $value->model) }}"
                                title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="{{ asset('assets/images/products/' . $value->model->image) }}"
                                        alt="{{ $value->name }}"></figure>
                            </a>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>{{ $value->name }}</span></a>
                            @if($value->model->sale_price > 0)
                            <div class="wrap-price"><span class="product-price">Rp. {{ $value->model->sale_price }}
                                </span>
                                <del>
                                    <p class="product-price">Rp. {{ $value->model->regular_price }}</p>
                                </del>
                                @else
                                <div class="wrap-price"><span class="product-price">Rp.
                                        {{ $value->model->regular_price }} </span>
                                    @endif
                                </div>
                                <a class="btn add-to-cart"
                                    wire:click.prevent="store({{$value->id}}, '{{ $value->name }}', {{ $value->model->sale_price > 0 && $sale->status == 'active' && $sale->sale_date > now() ? $value->model->sale_price : $value->model->regular_price }}, '{{ $value->rowId }}')">Move
                                    To Cart</a>
                                <div class="product-wish" style="cursor: pointer;">
                                    @if($myWishlist->contains($value->id))
                                    <a ><i class="fa fa-heart fill-hear" wire:click.prevent="addToWishlist({{ $value->id }}, '{{ $value->name }}', {{ $value->model->regular_price }}, 'remove')" style="color: #ff7007;" ></i></a>
                                    @else
                                    <a ><i class="fa fa-heart" wire:click.prevent="addToWishlist({{ $value->id }}, '{{ $value->name }}', {{ $value->model->regular_price }}, 'add')"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                </li>
                @empty
                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                    <p style="margin-top: 20px">No item wishlist</p>
                </li>
                @endforelse
            </ul>
        </div>
    </div>
</main>