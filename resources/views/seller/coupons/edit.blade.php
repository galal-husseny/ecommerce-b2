@extends('seller.layouts.parent')

@section('title', __('seller.edit_product.title'))

@section('header')
    @include('seller.layouts.partials.header')
@endsection

@section('content')
    @parent
    @include('seller.layouts.partials.sidebar')
    <div class="content-wrapper">
        <section class="content my-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> {{ __('seller.edit_coupon.title') }} ({{$coupon->code}}) </h3>
                            </div>
                            @include('seller.layouts.partials.errors')
                            <div class="card-body">
                                <form method="post" action="{{ route('sellers.coupons.update', \Illuminate\Support\Facades\Crypt::encryptString($coupon->id)) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="max_usage_number_per_user">{{ __('seller.add_coupon.max_usage_number_per_user') }}</label>
                                            <input type="number" name="max_usage_number_per_user" class="form-control" id="max_usage_number_per_user" value="{{ old('max_usage_number_per_user', $coupon->max_usage_number_per_user) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="discount">{{ __('seller.add_coupon.discount') }}</label>
                                            <input type="number" name="discount" class="form-control" id="discount"
                                                value="{{ old('discount', $coupon->discount) }}">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="max_discount_value">{{ __('seller.add_coupon.max_discount_value') }}</label>
                                            <input type="number" name="max_discount_value" class="form-control"
                                                id="max_discount_value" value="{{ old('max_discount_value', $coupon->max_discount_value) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="max_usage_number">{{ __('seller.add_coupon.max_usage_number') }}</label>
                                            <input type="number" name="max_usage_number" class="form-control" id="max_usage_number"
                                                value="{{ old('max_usage_number', $coupon->max_usage_number) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">{{ __('seller.add_coupon.status') }}</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="" disabled selected></option>
                                                <option @selected((string)old('status', $coupon->status) === '1') value="1">
                                                    {{ __('seller.add_coupon.active') }}</option>
                                                <option @selected((string)old('status', $coupon->status) === '0') value="0">
                                                    {{ __('seller.add_coupon.not_active') }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="min_order_value">{{ __('seller.add_coupon.min_order_value') }}</label>
                                            <input type="number" name="min_order_value" class="form-control" id="min_order_value"
                                                value="{{ old('min_order_value', $coupon->min_order_value) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="start_at">{{ __('seller.add_coupon.start_at') }}</label>
                                            <input type="date" name="start_at" class="form-control" id="start_at" value="{{ old('start_at', \Carbon\Carbon::parse($coupon->start_at)->format('Y-m-d')) }}" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+4 month')) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="end_at">{{ __('seller.add_coupon.end_at') }}</label>
                                            <input type="date" name="end_at" class="form-control" id="start_at" value="{{ old('end_at', \Carbon\Carbon::parse($coupon->end_at)->format('Y-m-d')) }}" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+7 month')) }}">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer ">
                                        <button type="submit" class="button-general w-50">
                                            {{ __('seller.edit_coupon.submit') }} </button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
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

@push('scripts')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endpush
