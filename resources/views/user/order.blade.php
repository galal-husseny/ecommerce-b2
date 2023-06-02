@extends('user.layouts.parent')
@section('title', __('messages.frontend.cart.your_cart'))

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection
@push('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('custom-css/orderBlade.css') }}" />
@endpush



@section('content')
    @parent
    <div class="container mb-5" style="margin-top: 10rem">
        <div class="row border">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        <div class="invoice-title">
                            <div class="mb-4">
                                <h2 class="mb-1 text-muted">{{env('WEBSITENAME')}}</h2>
                            </div>
                            <div class="text-muted">
                                <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> {{env('WEBSITEMAIL')}}</p>
                                <p><i class="uil uil-phone me-1"></i> {{env('WEBSITEPHONE')}}</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="">
                                <div class="text-muted">
                                    <h5 class="font-size-16 mb-3">Billed To:</h5>
                                    <h5 class="font-size-15 mb-2"> {{$user->name}} </h5>
                                    <p class="mb-1">{{$address->region->city->name}}, {{$address->region->name}}, {{$address->street}}, building: {{$address->building}}, floor: {{$address->floor}}, flat: {{$address->flat}}, type: {{$address->type}}, Notes: {{$address->notes}} </p>
                                    <p class="mb-1"> {{$user->email}} </p>
                                    <p>+2 {{$user->phone}}</p>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="my-4">
                            <h5 class="font-size-15">Order Summary</h5>

                            <table class="table mt-3">
                                <tr class="table_head">
                                    <th class="text-center"> No </th>
                                    <th class="text-center"> product image </th>
                                    <th class="text-center"> product name </th>
                                    <th class="text-center"> specs </th>
                                    <th class="text-center"> quantity </th>
                                    <th class="text-center"> price </th>
                                    <th class="text-center"> total </th>
                                </tr>
                                @foreach ($user->carts as $index => $product)
                                    <tr class="table_row">
                                        <td class="text-center"> {{++$index}} </td>
                                        <td class="  text-center">
                                            <div class="how-itemcart1 text-center">
                                                <img  src="{{ $product->getFirstMediaUrl('product', 'preview') }}"
                                                    alt="IMG">
                                            </div>
                                        </td>
                                        <td class=" text-center">
                                            <p class=" text-center">{{ $product->name }} </p>
                                            <p class=" text-center"> {{ $product->description }} </p>
                                        </td>
                                        <td class=" text-center">
                                            @if (count($product->specs) != 0)
                                                @foreach ($product->specs as $spec)
                                                    <p class="text-center"> {{ $spec->name }} : {{ $spec->pivot->value }} </p>
                                                @endforeach
                                                @else
                                                    <p class="text-center text-danger"> No specs available </p>
                                            @endif
                                        </td>
                                        <td class=" text-center">
                                            <p class=" cl3 txt-center">
                                                {{ $product->carts->quantity }}
                                            </p>
                                        </td>
                                        <td class="  text-center">
                                            {{ $product->sale_price_with_currency() }} </td>
                                        <td class=" text-center">
                                            {{ $product->sale_price_with_currency($product->carts->quantity) }} </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" > </td>
                                    <th scope="row" class="text-start font-weight-bold">Sub Total</th>
                                    <td class="text-center">{{$subTotal}} {{__('user.shared.currency')}}</td>
                                </tr>
                                <!-- end tr -->
                                @if ($coupon)
                                <tr>
                                    <td colspan="5" > </td>
                                    <th scope="row" class="text-start font-weight-bold">
                                        Coupon applied :</th>
                                        <td class="text-center">{{$coupon->code}}</td>
                                </tr>
                                @endif
                                <!-- end tr -->
                                @if ($discountValue !=0)
                                <tr>
                                    <td colspan="5" > </td>
                                    <th scope="row" class="text-start font-weight-bold">
                                        Discount :</th>
                                        <td class="text-center">- {{$discountValue}} {{__('user.shared.currency')}}</td>
                                </tr>
                                @endif

                                <!-- end tr -->
                                <tr>
                                    <td colspan="5" > </td>
                                    <th scope="row" class="text-start font-weight-bold">
                                        Shipping Charge :</th>
                                    <td class="text-center">{{$shippingValue}} {{__('user.shared.currency')}} </td>
                                </tr>
                                <!-- end tr -->
                                <tr>
                                    <td colspan="5" > </td>
                                    <th scope="row" class="text-start font-weight-bold">Total</th>
                                    <td class="text-center font-weight-bold">{{$orderTotalAfterDiscount + $shippingValue}} {{__('user.shared.currency')}} </td>
                                </tr>
                                <!-- end tr -->
                            </table>
                            <!-- end table responsive -->
                            <div class="d-print-none mt-4">
                                <div class="d-flex flex-row-reverse">
                                    <form action="{{route('placeOrder')}}" method="post" class="w-50">
                                        @csrf
                                        <input type="hidden" name="coupon" value="{{$coupon->code ?? ""}}">
                                        <input type="hidden" name="address" value="{{$address->id}}">
                                        <button type="submit" class="button-main w-50">Place order</button>
                                    </form>
                                    <a href="javascript:window.print()" class="button-main mx-2 w-25"><i class="fa fa-print"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>
@endsection
