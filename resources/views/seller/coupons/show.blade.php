@extends('seller.layouts.parent')

@section('title', __('seller.show_coupon.title'))

@section('header')
    @include('seller.layouts.partials.header')
@endsection

@section('content')
    @parent
    @include('seller.layouts.partials.sidebar')
    <div class="content-wrapper">
        <section class="content my-5">
            <div class="container-fluid">
                <div class="row card">
                    <div class="card-header col-12">
                        <h3> {{ __('seller.show_coupon.title') }} </h3>
                    </div>
                    @include('seller.layouts.partials.errors')
                    <div class="card col-12">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <table id="example1" class="table  table-striped">
                                        <tbody>
                                            <tr>
                                                <td>{{ __('seller.show_coupon.id') }}</td>
                                                <td class="text-center">{{ $coupon->id }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_coupon.max_usage_number_per_user') }}</td>
                                                <td class="text-center">{{ $coupon->max_usage_number_per_user }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_coupon.discount') }}</td>
                                                <td class="text-center">{{ $coupon->discount }} %</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_coupon.max_discount_value') }}</td>
                                                <td class="text-center">{{ $coupon->max_discount_value_with_currency() }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_coupon.min_order_value') }}</td>
                                                <td class="text-center">{{ $coupon->min_order_value_with_currency() }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_coupon.code') }}</td>
                                                <td class="text-center">{{ $coupon->code }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_coupon.status') }}</td>
                                                <td @class([
                                                    'text-center',
                                                    'text-success' => $coupon->status,
                                                    'text-danger' => !$coupon->status,
                                                ])>
                                                    {{ __('seller.all_products.' . printEnum(App\Enums\CategoryEnum::class, $coupon->status)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_coupon.start_at') }}</td>
                                                <td class="text-center">{{ $coupon->start_at }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_coupon.end_at') }}</td>
                                                <td class="text-center">
                                                    {{ $coupon->end_at }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer')
    @include('seller.layouts.partials.footer')
@endsection
