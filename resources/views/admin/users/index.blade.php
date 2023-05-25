@extends('admin.layouts.parent')

@section('title', __('messages.frontend.shop.title'))

@section('header')
    @include('admin.layouts.partials.header')
@endsection

@section('content')
    @parent
    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60 mt-5">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> {{__('admin.sidebar.specs.all')}} </h3>
                            <a href="{{route('admins.specs.create')}}" class="button-general col-3 ml-auto"> {{__('admin.sidebar.specs.create')}} </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('admin.all_specs.id') }}</th>
                                        <th>{{ __('admin.all_specs.name') }}</th>
                                        <th>{{ __('admin.all_specs.operations') }}</th>
                                        <th>{{ __('admin.all_specs.operations') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ ucfirst($user->name) }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->status }}</td>

                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
                    {{-- <div class="mt-3">
                        <table class="table-shopping-cart ">
                            <tr class="table_head">
                                <th class="column-1 col-1 text-center"> # </th>
                                <th class="column-2 col-1 text-center"> {{ __('messages.frontend.address.city') }} </th>
                                <th class="column-3 col-2 text-center"> {{ __('messages.frontend.address.region') }}</th>
                                <th class="column-4 col-1 text-center"> {{ __('messages.frontend.address.street') }} </th>
                                <th class="column-5 col-1 text-center"> {{ __('messages.frontend.address.building') }} </th>
                                <th class="column-6 col-1 text-center"> {{ __('messages.frontend.address.floor') }} </th>
                                <th class="column-7 col-1 text-center"> {{ __('messages.frontend.address.flat') }} </th>
                                <th class="column-8 col-1 text-center"> {{ __('messages.frontend.address.notes') }} </th>
                                <th class="column-9 col-1 text-center"> {{ __('messages.frontend.address.type') }} </th>
                                <th class="column-10 col-2 text-center"> {{ __('messages.frontend.address.actions') }} </th>
                            </tr>
                            @foreach ($user->addresses as $index => $address)
                                <tr class="table_row">
                                    <td class="column-1 text-center"> {{ ++$index }} </td>
                                    <td class="column-2 text-center">{{ $address->region->city->name }}</td>
                                    <td class="column-3 text-center"> {{ $address->region->name }} </td>
                                    <td class="column-4 text-center"> {{ $address->street }} </td>
                                    <td class="column-5 text-center"> {{ $address->building }} </td>
                                    <td class="column-6 text-center"> {{ $address->floor }} </td>
                                    <td class="column-7 text-center"> {{ $address->flat }} </td>
                                    <td class="column-8 text-center"> {{ $address->notes }} </td>
                                    <td class="column-9 text-center"> {{ $address->type }} </td>
                                    <td class="column-10 text-center">
                                        <a href="{{ route('users.address.edit', \Illuminate\Support\Facades\Crypt::encryptString($address->id)) }}" class="button-main mb-2"> {{ __('messages.frontend.address.edit') }} </a>
                                        <form action="{{ route('users.address.destroy', \Illuminate\Support\Facades\Crypt::encryptString($address->id)) }}" method="post" class="d-iniline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button-delete"> {{ __('messages.frontend.address.delete') }} </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div> --}}
                {{-- <div class="mt-3">
                    <table id="example1" class="table table-bordered table-hover">
                        <tr class="table_head">
                            <th class="column-1 text-center"> {{ __('messages.frontend.cart.product') }} </th>
                            <th class="column-2 text-center"></th>
                            <th class="column-3 text-center"> {{ __('messages.frontend.cart.price') }} </th>
                            <th class="column-4 text-center"> {{ __('messages.frontend.cart.quantity') }} </th>
                            <th class="column-5 text-center"> {{ __('messages.frontend.cart.total') }} </th>
                        </tr>
                        @foreach ($user->carts as $product)
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1 deleteProduct" data-product="<?= htmlspecialchars($product) ?>">
                                        <img src="{{ $product->getFirstMediaUrl('product', 'preview') }}" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">{{ $product->name }}</td>
                                <td class="column-3 productPrice"> {{ $product->sale_price_with_currency() }} </td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input data-product="<?= htmlspecialchars($product) ?>" class="mtext-104 cl3 txt-center num-product product" type="number" name="num-product1" value="{{ $product->carts->quantity }}">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <a class=" num-products" type="submit">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5 productTotal">{{ $product->sale_price_with_currency($product->carts->quantity) }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div> --}}




        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
                    </li>

                    {{-- <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews ({{ count($product->reviews) }})</a>
                    </li> --}}
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    {{-- <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                {{ $product->description }}
                            </p>
                        </div>
                    </div> --}}

                    <!-- - -->
                    {{-- <div class="tab-pane fade" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">
                                    @foreach ($product->specs as $spec)
                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                {{ $spec->name }}
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                {{ $spec->pivot->value }}
                                            </span>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div> --}}

                    <!-- - -->
                    {{-- <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    <!-- Review -->
                                    @foreach ($product->reviews as $review)
                                        <div class="flex-w flex-t p-b-68">
                                            <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                <img src="{{ asset('frontend-assets/images/avatar-01.jpg') }}" alt="AVATAR">
                                            </div>

                                            <div class="size-207">
                                                <div class="flex-w flex-sb-m p-b-17">
                                                    <span class="mtext-107 cl2 p-r-20">
                                                        {{ $review->user->name }}
                                                    </span>

                                                    <span class="fs-18 cl11">
                                                        @for ($i = 0; $i < $review->rate; $i++)
                                                            <i class="zmdi zmdi-star text-success"></i>
                                                        @endfor
                                                        @for ($i = 0; $i < 5 - $review->rate; $i++)
                                                            <i class="zmdi zmdi-star-outline"></i>
                                                        @endfor

                                                    </span>
                                                </div>

                                                <p class="stext-102 cl6">
                                                    {{ $review->comment }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach


                                    <!-- Add review -->
                                    <form class="w-full">
                                        <h5 class="mtext-108 cl2 p-b-7">
                                            Add a review
                                        </h5>

                                        <p class="stext-102 cl6">
                                            Your email address will not be published. Required fields are marked *
                                        </p>

                                        <div class="flex-w flex-m p-t-50 p-b-23">
                                            <span class="stext-102 cl3 m-r-16">
                                                Your Rating
                                            </span>

                                            <span class="wrap-rating fs-18 cl11 pointer">
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <input class="dis-none" type="number" name="rating">
                                            </span>
                                        </div>

                                        <div class="row p-b-25">
                                            <div class="col-12 p-b-5">
                                                <label class="stext-102 cl3" for="review">Your review</label>
                                                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                            </div>

                                            <div class="col-sm-6 p-b-5">
                                                <label class="stext-102 cl3" for="name">Name</label>
                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
                                            </div>

                                            <div class="col-sm-6 p-b-5">
                                                <label class="stext-102 cl3" for="email">Email</label>
                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
                                            </div>
                                        </div>

                                        <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        </div>

        <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
            <span class="stext-107 cl6 p-lr-25">
                SKU: JAK-01
            </span>

            {{-- <span class="stext-107 cl6 p-lr-25">
                Categories: {{ $product->category->name }}
            </span> --}}
        </div>
    </section>


    <!-- Related Products -->
    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Related Products
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('frontend-assets/images/product-01.jpg') }}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Esprit Ruffle Shirt
                                    </a>

                                    <span class="stext-105 cl3">
                                        $16.64
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend-assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend-assets/images/icons/icon-heart-02.png') }}" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('frontend-assets/images/product-02.jpg') }}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Herschel supply
                                    </a>

                                    <span class="stext-105 cl3">
                                        $35.31
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend-assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend-assets/images/icons/icon-heart-02.png') }}" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('frontend-assets/images/product-03.jpg') }}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Only Check Trouser
                                    </a>

                                    <span class="stext-105 cl3">
                                        $25.50
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend-assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend-assets/images/icons/icon-heart-02.png') }}" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('frontend-assets/images/product-04.jpg') }}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Classic Trench Coat
                                    </a>

                                    <span class="stext-105 cl3">
                                        $75.00
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend-assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend-assets/images/icons/icon-heart-02.png') }}" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('frontend-assets/images/product-05.jpg') }}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Front Pocket Jumper
                                    </a>

                                    <span class="stext-105 cl3">
                                        $34.75
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend-assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('fronimages/icons/icon-heart-02.png') }}" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('frontend-assets/images/product-06.jpg') }}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Vintage Inspired Classic
                                    </a>

                                    <span class="stext-105 cl3">
                                        $93.20
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend-assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend-assets/images/icons/icon-heart-02.png') }}" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('frontend-assets/images/product-07.jpg') }}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Shirt in Stretch Cotton
                                    </a>

                                    <span class="stext-105 cl3">
                                        $52.66
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend-assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend-assets/images/icons/icon-heart-02.png') }}" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('frontend-assets/images/product-08.jpg') }}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Pieces Metallic Printed
                                    </a>

                                    <span class="stext-105 cl3">
                                        $18.96
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend-assets/images/icons/icon-heart-01.png') }}" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend-assets/images/icons/icon-heart-02.png') }}" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection

@push('scripts')
    <script src="{{ asset('dashboard-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endpush
