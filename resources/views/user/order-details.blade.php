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
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 border p-3">
                    <div class="card">
                        <div>
                            <h3 class="card-title"> Order details </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <tbody>
                                    <tr class="table_row">
                                        <td class="text-center">order code </td>
                                        <td class="text-center">{{ $order->code }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">order satus </td>
                                        <td @class([
                                            'p-2',
                                            'text-center',
                                            'text-success' => $order->status == 2,
                                            'text-primary' => $order->status == 1,
                                            'text-danger' => !$order->status,
                                        ])>{{ __('admin.all_orders.' . printEnum(App\Enums\OrderEnum::class, $order->status)) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">order total price </td>
                                        <td class="text-center"> {{ $order->total_price }} </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">order final price </td>
                                        <td class="text-center"> {{ $order->final_price }} </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">order delivery date </td>
                                        <td class="text-center"> {{ $order->delivery_date }} </td>
                                    </tr>
                                    @if ($order->coupon)
                                        <tr>
                                        <td class="text-center">coupon applied </td>
                                        <td class="text-center"> {{$order->coupon->code}} </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td class="text-center">order shipping address </td>
                                        <td class="text-center"> {{$order->address->region->city->name}}, {{$order->address->region->name}}, street: {{$order->address->street}}, building: {{$order->address->building}}, floor: {{$order->address->floor}}, flat: {{$order->address->flat}}, Notes: {{$order->address->notes}}, Type: {{$order->address->type}}
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
