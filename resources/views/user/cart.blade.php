@extends('user.layouts.parent')
@section('title', __('messages.frontend.cart.your_cart'))

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection

@section('content')
    @parent
    <!-- breadcrumb -->
    <div class="container" style="margin-top: 100px">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a style="text-decoration: none" href="{{ route('users.dashboard') }}" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Shoping Cart
            </span>
        </div>
    </div>


    <!-- Shoping Cart -->
    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
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
                        </div>


                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            {{ __('messages.frontend.cart.cart_total') }}
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    {{ __('messages.frontend.cart.subtotal') }}
                                </span>
                            </div>

                            <div class="size-209m subTotal">
                                <span class="mtext-110 cl2" id="subTotal">
                                    {{ $subTotal }} {{ __('user.shared.currency') }}
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    {{ __('messages.frontend.cart.shipping') }}
                                </span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-111 cl6 p-t-2">
                                    {{ __('messages.frontend.cart.select_address') }}
                                </p>

                                <div class="p-t-15">
                                    @if ($user->addresses)
                                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                            <select class="js-select2" name="time">
                                                @foreach ($user->addresses as $address)
                                                    <option @selected($loop->last)>
                                                        {{ $address->region->city->name }},
                                                        {{ $address->region->name }},
                                                        {{ $address->street }},
                                                        {{ __('messages.frontend.cart.building') }}: {{ $address->building }} -
                                                        @if ($address->floor)
                                                            {{ __('messages.frontend.cart.floor') }}: {{ $address->floor }} -
                                                        @endif
                                                        @if ($address->flat)
                                                            {{ __('messages.frontend.cart.flat') }}: {{ $address->flat }} -
                                                        @endif
                                                        @if ($address->notes)
                                                            {{ __('messages.frontend.cart.notes') }}: {{ $address->notes }} -
                                                        @endif
                                                        ({{ $address->type }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    @else
                                        <p> {{ __('messages.frontend.cart.no_addresses') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <a href="{{ route('users.address.index') }}" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5 " user-value="{{ $user->id }}">
                                    {{ __('messages.frontend.cart.add_address') }}
                                </a>
                            </div>
                        </div>
                        <div class="flex-w flex-sb-m  p-t-18 p-b-15 ">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5 coupon" type="text" name="coupon" placeholder="{{ __('messages.frontend.cart.coupon_code') }}" value="{{ old('coupon') }}">
                                <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5 applyCoupon" user-value="{{ $user->id }}">
                                    {{ __('messages.frontend.cart.apply_coupon') }}
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    {{ __('messages.frontend.cart.total') }}:
                                </span>
                            </div>
                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    {{ $subTotal }} {{ __('user.shared.currency') }}
                                </span>
                            </div>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            {{ __('messages.frontend.cart.proceed') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        var translations = {
            currency: "{{ __('user.shared.currency') }}"
        };
        const subtotal = $('#subTotal')
        console.log(subTotal)

        $(document).ready(function() {
            $('.applyCoupon').click(function() {
                const user_id = $(this).attr('user-value');
                const coupon = $('.coupon').val();
                const url = "{{ asset('api/products/carts/applyCoupon') }}";
                const method = "POST";
                const body = {
                    'user_id': user_id,
                    'couponCode': coupon,
                };
                $.ajax({
                    url: url,
                    type: method,
                    headers: {
                        'accept': 'application/json'
                    },
                    data: body,
                    success: function(result, status, xhr) {
                        // $('.productTotal').val()
                    },
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'Failed',
                            'somthing went wrong',
                            'error'
                        );
                    },
                });
            });
            $('.product').change(function() {
                var product = $(this).data('product')
                const product_id = product.id;
                const user_id = product.carts.user_id;
                const quantity = $(this).val()
                const productTotal = $(this).closest('.table_row').find('.productTotal');
                const url = "{{ asset('api/products/carts/handle') }}";
                const method = "POST";
                const body = {
                    'user_id': user_id,
                    'product_id': product_id,
                    'quantity': quantity,
                };
                const tableRow = $(this).closest('.table_row');
                $.ajax({
                    url: url,
                    type: method,
                    headers: {
                        'accept': 'application/json'
                    },
                    data: body,
                    success: function(result, status, xhr) {
                        if (quantity == 0) {
                            // Remove the table row if the quantity is 0
                            tableRow.remove();
                        } else {
                            productTotal.html((product.sale_price * quantity) + ' ' + translations.currency);
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'Failed',
                            'somthing went wrong',
                            'error'
                        );
                    },
                    complete: function(result) {
                        updateSubTotal();
                    }
                });
            });
            $('.deleteProduct').click(function() {
                var product = $(this).data('product')
                const product_id = product.id;
                const user_id = product.carts.user_id;
                const quantity = 0;
                const url = "{{ asset('api/products/carts/handle') }}";
                const method = "POST";
                const body = {
                    'user_id': user_id,
                    'product_id': product_id,
                    'quantity': quantity,
                };
                const tableRow = $(this).closest('.table_row');
                $.ajax({
                    url: url,
                    type: method,
                    headers: {
                        'accept': 'application/json'
                    },
                    data: body,
                    success: function(result, status, xhr) {
                        tableRow.remove();
                    },
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'Failed',
                            'somthing went wrong',
                            'error'
                        );
                    },
                    complete: function(result) {
                        updateSubTotal();
                    }
                });
            });

        })

        function updateSubTotal() {
            var product = $('.product').data('product')
            const product_id = product.id;
            const user_id = product.carts.user_id;
            const quantity = 0;
            const url = "{{ asset('api/products/carts/handle') }}";
            const method = "POST";
            const body = {
                'user_id': user_id,
                'product_id': product_id,
                'quantity': quantity,
            };
            $.ajax({
                url: url,
                type: method,
                headers: {
                    'accept': 'application/json'
                },
                data: body,
                success: function(result, status, xhr) {
                    $('#subTotal').html(result.data.subTotal + " " + translations.currency)
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        'Failed',
                        'somthing went wrong',
                        'error'
                    );
                },
            });
        }
    </script>
@endpush
