@extends('user.layouts.parent')

@section('title', __('messages.frontend.index.title'))

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('cart')
    @include('user.layouts.partials.cart')
@endsection

@section('wishlist')
    @include('user.layouts.partials.wishlist')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection

@section('content')
    @parent
    <!-- Slider -->
    <section class="section-slide" style="margin-top: 5.5rem">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1" style="background-image: url({{ asset('frontend-assets/images/slide-01.jpg') }});">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Women Collection 2018
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    NEW SEASON
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a style="text-decoration: none" href="{{ route('shop') }}"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    {{ __('messages.frontend.index.shop_now') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url({{ asset('frontend-assets/images/slide-02.jpg') }});">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Men New-Season
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    Jackets & Coats
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a style="text-decoration: none" href="{{ route('shop') }}"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    {{ __('messages.frontend.index.shop_now') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url({{ asset('frontend-assets/images/slide-03.jpg') }});">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Men Collection 2018
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    New arrivals
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                                <a style="text-decoration: none" href="{{ route('shop') }}"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    {{ __('messages.frontend.index.shop_now') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Banner -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="mx-auto" style="width: 90%">
            <div class="row">
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{ asset('frontend-assets/images/banner-01.jpg') }}" alt="IMG-BANNER">

                        <a style="text-decoration: none" href="product.html"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Women
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    {{ __('messages.frontend.index.shop_now') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{ asset('frontend-assets/images/banner-02.jpg') }}" alt="IMG-BANNER">

                        <a style="text-decoration: none" href="product.html"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Men
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    {{ __('messages.frontend.index.shop_now') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{ asset('frontend-assets/images/banner-03.jpg') }}" alt="IMG-BANNER">

                        <a style="text-decoration: none" href="product.html"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Accessories
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    New Trend
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    {{ __('messages.frontend.index.shop_now') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class=" mx-auto" style="width: 90%">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    {{ __('messages.frontend.index.product_overview') }}
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        {{ __('messages.frontend.index.all_products') }}
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                        Women
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
                        Men
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
                        Bag
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
                        Shoes
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
                        Watches
                    </button>
                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    <div
                        class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="m-2 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        {{ __('messages.frontend.index.filter') }}
                    </div>

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="m-2 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        {{ __('messages.frontend.index.search') }}
                    </div>
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search "></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product"
                            placeholder="{{ __('messages.frontend.index.search') }}">
                    </div>
                </div>

                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                {{ __('messages.frontend.index.sort_by') }}
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.default') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.popularity') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.avg_rating') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04 filter-link-active">
                                        {{ __('messages.frontend.index.newest') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.price_low_high') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.price_high_low') }}
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col2 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                {{ __('messages.frontend.index.price') }}
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04 filter-link-active">
                                        {{ __('messages.frontend.index.all') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04">
                                        $0.00 - $50.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04">
                                        $50.00 - $100.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04">
                                        $100.00 - $150.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04">
                                        $150.00 - $200.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04">
                                        $200.00+
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col3 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                {{ __('messages.frontend.index.color') }}
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.black') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04 filter-link-active">
                                        {{ __('messages.frontend.index.blue') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.grey') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.green') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.red') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                                        <i class="zmdi zmdi-circle-o"></i>
                                    </span>

                                    <a style="text-decoration: none" href="#"
                                        class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.white') }}
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col4 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                {{ __('messages.frontend.index.tags') }}
                            </div>

                            <div class="flex-w p-t-4 m-r--5">
                                <a style="text-decoration: none" href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    {{ __('messages.frontend.index.fashion') }}
                                </a>

                                <a style="text-decoration: none" href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    {{ __('messages.frontend.index.lifestyle') }}
                                </a>

                                <a style="text-decoration: none" href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    {{ __('messages.frontend.index.denim') }}
                                </a>

                                <a style="text-decoration: none" href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    {{ __('messages.frontend.index.streetstyle') }}
                                </a>

                                <a style="text-decoration: none" href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    {{ __('messages.frontend.index.crafts') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row isotope-grid">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0" id="products"
                                data-products="<?= htmlspecialchars($products) ?>">
                                <a style="text-decoration: none" href="{{ route('product-details', \Illuminate\Support\Facades\Crypt::encryptString($product->id)) }}">
                                    <img src="{{ $product->getFirstMediaUrl('product', 'preview') }}" alt="IMG-PRODUCT">
                                </a>
                                {{-- <a style="text-decoration: none" href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1"
                                    onclick="showImg({{ $product->id }})">
                                    {{ __('messages.frontend.index.quick_view') }}
                                </a> --}}
                                @auth('web')
                                    <button type="button" class=" addToCart block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" user-value="{{ Auth::guard('web')->id() }}" product-value="{{ $product->id }}">
                                        {{ __('messages.frontend.index.add_to_cart') }}
                                    </button>
                                @else
                                    <button type="button" class="addToCart block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" user-value="" product-value="{{ $product->id }}">
                                        {{ __('messages.frontend.index.add_to_cart') }}
                                    </button>
                                @endauth
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a style="text-decoration: none" href="{{ route('product-details', \Illuminate\Support\Facades\Crypt::encryptString($product->id)) }}"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->name }}
                                    </a>

                                    <span class="stext-105 cl3">
                                        {{ $product->sale_price_with_currency() }}
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    @auth('web')
                                        <button type="button" class="btn-addwish-b2 dis-block pos-relative addToWishlist" user-value="{{ Auth::guard('web')->id() }}" product-value="{{ $product->id }}">
                                            <img @class([
                                                "icon-heart1",
                                                'dis-block',
                                                'trans-04'
                                            ]) src="{{ asset('frontend-assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                            <img @class([
                                                'icon-heart2' => !in_array($product->id, $user->wishlists->pluck('id')->toArray()),
                                                'dis-block',
                                                'trans-04',
                                                'ab-t-l'
                                            ]) src="{{ asset('frontend-assets/images/icons/icon-heart-02.png') }}"
                                                alt="ICON">
                                        </button>
                                    @else

                                    @endauth

                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>


            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                <a style="text-decoration: none" href="#"
                    class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    {{ __('messages.frontend.index.load_more') }}
                </a>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" tabindex="1000" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    jhbvdhfbdv
                </div>
            </div>
        </div>

        <!-- Modal1 -->
        {{-- <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
            <div class="overlay-modal1 js-hide-modal1"></div>

            <div class="container">
                <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                    <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                        <img src="{{ asset('frontend-assets/images/icons/icon-close.png') }}" alt="CLOSE">
                    </button>

                    <div class="row">
                        <div class="col-md-6 col-lg-7 p-b-30">
                            <div class="p-l-25 p-r-30 p-lr-0-lg">
                                <div class="wrap-slick3 flex-sb flex-w">
                                    <div class="wrap-slick3-dots" id="wrap-slick3-dots"></div>
                                    <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                    <div class="slick3 gallery-lb" id="gallery-lb">
                                        {{-- <div class="item-slick3"
                                            data-thumb="{{ asset('frontend-assets/images/product-detail-01.jpg') }}">
                                            <div class="wrap-pic-w pos-relative">
                                                <img id="main-img"
                                                    src="{{ asset('frontend-assets/images/product-detail-01.jpg') }}"
                                                    alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                    href="{{ asset('frontend-assets/images/product-detail-01.jpg') }}">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="item-slick3"
                                            data-thumb="{{ asset('frontend-assets/images/product-detail-02.jpg') }}">
                                            <div class="wrap-pic-w pos-relative">
                                                <img id="main-img"
                                                    src="{{ asset('frontend-assets/images/product-detail-02.jpg') }}"
                                                    alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                    href="{{ asset('frontend-assets/images/product-detail-01.jpg') }}">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-5 p-b-30">
                            <div class="p-r-50 p-t-5 p-lr-0-lg">
                                <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                    Lightweight Jacket
                                </h4>

                                <span class="mtext-106 cl2">
                                    $58.79
                                </span>

                                <p class="stext-102 cl3 p-t-23">
                                    Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat
                                    ornare feugiat.
                                </p>

                                <!--  -->
                                <div class="p-t-33" id="specs">
                                    {{-- <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-203 flex-c-m respon6">
                                            Size
                                        </div>

                                        <div class="size-204 respon6-next">
                                            <div class="rs1-select2 bor8 bg0">
                                                <select class="js-select2" name="time">
                                                    <option>Choose an option</option>
                                                    <option>Size S</option>
                                                    <option>Size M</option>
                                                    <option>Size L</option>
                                                    <option>Size XL</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-204 flex-w flex-m respon6-next">
                                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                    name="num-product" value="1">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>

                                            <button
                                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                                Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!--  -->
                                <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                                    <div class="flex-m bor9 p-r-10 m-r-11">
                                        <a href="#"
                                            class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                            data-tooltip="Add to Wishlist">
                                            <i class="zmdi zmdi-favorite"></i>
                                        </a>
                                    </div>

                                    <a href="#"
                                        class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                        data-tooltip="Facebook">
                                        <i class="fab fa-facebook"></i>
                                    </a>

                                    <a href="#"
                                        class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                        data-tooltip="Twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>

                                    <a href="#"
                                        class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                        data-tooltip="Google Plus">
                                        <i class="fab fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </section>
@endsection

@push('scripts')
    <script>
        function showImg(productId) {
            // showing product media
            var products = JSON.parse(document.getElementById('products').dataset.products);
            const product = products.find(obj => obj.id === productId);
            const imgul = document.createElement('ul');
            for (var i = 0; i < product.media.length; i++) {
                const div = document.createElement('div');
                div.setAttribute('class', 'item-slick3');
                div.setAttribute('data-thumb', product.media[i].preview_url);
                div.setAttribute('data-slick-index', i);
                div.setAttribute('role', 'tabpanel');
                div.setAttribute('style', 'width: 50%; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;');
                div.innerHTML = `<div class="wrap-pic-w pos-relative">
                                    <img  src="` + product.media[i].preview_url + `">
                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="` + product.media[i].preview_url + `">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>`;
                document.querySelector('.slick3.gallery-lb .slick-list.draggable .slick-track').append(div);
                if (i == 0) {
                    const li1 = document.createElement("li");
                    li1.innerHTML = `<li class="slick-active my-3" role="presentation">
                                            <img style="width:100%" src="` + product.media[i].preview_url + `">
                                            <div class="slick3-dot-overlay"></div>
                                        </li>`
                    imgul.appendChild(li1);
                } else {
                    const li2 = document.createElement("li");
                    li2.innerHTML = `<li  role="presentation">
                                            <img style="width:100%; " src="` + product.media[i].preview_url + `">
                                            <div class="slick3-dot-overlay"></div>
                                        </li>`
                    imgul.appendChild(li2);
                }
                document.getElementById('wrap-slick3-dots').append(imgul)
            }
            // showing product data
            if (document.getElementsByTagName("html")[0].getAttribute("lang") == 'en') {
                document.querySelector('h4.mtext-105').innerHTML = product.name.en.replace(/^./, function(match) {
                    return match.toUpperCase();
                });
                document.querySelector('span.mtext-106').innerHTML = product.sale_price + ' EGP'
                document.querySelector('p.stext-102').innerHTML = product.description.en
            } else if (document.getElementsByTagName("html")[0].getAttribute("lang") == 'ar') {
                document.querySelector('h4.mtext-105').innerHTML = product.name.ar
                document.querySelector('span.mtext-106').innerHTML = product.sale_price + ' ج.م'
                document.querySelector('p.stext-102').innerHTML = product.description.ar
            }
            product.specs.forEach(spec => {
                const specWrap = document.createElement('div');
                specWrap.setAttribute('class', 'flex-w flex-r-m p-b-10')
                const specName = document.createElement('div');
                specName.setAttribute('class', 'size-203 flex-c-m respon6');
                specWrap.appendChild(specName);
                const specValueWrap = document.createElement('div');
                specValueWrap.setAttribute('class', 'size-204 respon6-next')
                const div = document.createElement('div');
                div.setAttribute('class', 'rs1-select2 bor8 bg0');
                specValueWrap.appendChild(div);
                const select = document.createElement('select');
                select.setAttribute('name', 'time');
                select.setAttribute('class', 'js-select2  custom-select');
                div.appendChild(select);
                const staticOption = document.createElement('option');
                staticOption.innerHTML = 'Choose an option'
                select.appendChild(staticOption);
                const option = document.createElement('option')
                if (document.getElementsByTagName("html")[0].getAttribute("lang") == 'en') {
                    specName.innerHTML = spec.name.en
                    option.setAttribute('value', spec.pivot.value.en)
                    option.innerHTML = spec.pivot.value.en
                } else if (document.getElementsByTagName("html")[0].getAttribute("lang") == 'ar') {
                    specName.innerHTML = spec.name.ar
                    option.setAttribute('value', spec.pivot.value.ar)
                    option.innerHTML = spec.pivot.value.ar
                }
                select.appendChild(option);
                specWrap.appendChild(specValueWrap);
                document.getElementById('specs').prepend(specWrap)
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('.addToCart').click(function() {
                const user_id = $(this).attr('user-value');
                const product_id = $(this).attr('product-value');
                const url = "{{ asset('api/products/carts/handle') }}";
                const method = "POST";
                const body = {
                    'user_id': user_id,
                    'product_id': product_id
                };
                $.ajax({
                    url: url,
                    type: method,
                    headers: {
                        'accept': 'application/json'
                    },
                    data: body,
                    success: function(result, status, xhr) {
                        $('#cart').attr('data-notify', result.data.carts_count)
                    },
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'Failed',
                            'somthing went wrong',
                            'error'
                        );
                    },
                });
            })
            $('.addToWishlist').click(function() {
                const product_id = $(this).attr('product-value');
                const user_id = $(this).attr('user-value');
                const url = "{{ asset('api/products/wishlists/handle') }}";
                const method = "POST";
                const body = {
                    'user_id': user_id,
                    'product_id': product_id
                };
                const button = $(this);
                $.ajax({
                    url: url,
                    type: method,
                    headers: {
                        'accept': 'application/json'
                    },
                    data: body,
                    success: function(result) {
                        $('#wishlist').attr('data-notify', result.data.wishlists_count);
                        button.children().eq(1).toggleClass('icon-heart2')

                    },
                    error: function(result) {
                        console.log(result);
                        Swal.fire(
                            'Failed',
                            'Something went wrong',
                            'error'
                        );
                    }
                })
            })
        });
    </script>
@endpush
