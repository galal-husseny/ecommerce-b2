<!-- wishlist -->
<div class="wrap-header-wishlist js-panel-wishlist">
    <div class="s-full js-hide-cart"></div>

    <div class="header-wishlist flex-col-l p-l-65 p-r-25">
        <div class="header-wishlist-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                {{__('messages.frontend.cart.your_cart')}}
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-wishlist-content flex-w js-pscroll">
            <ul class="header-wishlist-wrapitem w-full">
                @auth('web')
                    @foreach ($user->carts as $product )
                    <li class="header-wishlist-item flex-w flex-t m-b-12">
                        <div class="header-wishlist-item-img">
                            <img src="{{$product->getFirstMediaUrl('product', 'preview')}}" alt="IMG">
                        </div>

                        <div class="header-wishlist-item-txt p-t-8">
                            <a href="#" class="header-wishlist-item-name m-b-18 hov-cl1 trans-04">
                                {{$product->name}}
                            </a>

                            <span class="header-wishlist-item-info">
                                1 x {{$product->sale_price_with_currency()}}
                            </span>
                        </div>
                    </li>
                    @endforeach
                @endauth

            </ul>

            <div class="w-full">
                <div class="header-wishlist-total w-full p-tb-40">
                    {{__('messages.frontend.cart.total')}} $75.00
                </div>

                <div class="header-wishlist-buttons flex-w w-full">
                    <a href="{{route('cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        {{__('messages.frontend.cart.view_cart')}}
                    </a>

                    <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        {{__('messages.frontend.cart.checkout')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
