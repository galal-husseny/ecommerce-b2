@extends('seller.layouts.parent')

@section('title', __('seller.show_product.title'))

@section('header')
    @include('seller.layouts.partials.header')
@endsection


@push('links')
    <link rel="stylesheet" href="{{ asset('dashboard-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dashboard-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@push('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
@endpush

@section('content')
    @parent
    @include('seller.layouts.partials.sidebar')
    <div class="content-wrapper">
        <section class="content my-5">
            <div class="container-fluid">
                <div class="row card">
                    <div class="card-header col-12">
                        <h3> {{ __('seller.show_product.title') }} </h3>
                    </div>
                    @include('seller.layouts.partials.errors')
                    <div class="card mb-3 col-12">
                        <div class="row g-0 p-2 align-items-center">
                            <div class="col-md-4">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach ($product->getMedia('product') as $index => $media)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}"
                                                @if ($index == 0) class="active" @endif></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach ($product->getMedia('product') as $index => $media)
                                            <div class="carousel-item @if ($index == 0) active @endif">
                                                <img class="d-block w-100" src="{{ $media->getUrl('preview') }}"
                                                    alt="Second slide">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <table id="example1" class="table  table-striped">
                                        <tbody>
                                            <tr>
                                                <td>{{ __('seller.show_product.id') }}</td>
                                                <td class="text-center">{{ $product->id }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.name_en') }}</td>
                                                <td class="text-center">{{ $product->getTranslation('name', 'en') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.name_ar') }}</td>
                                                <td class="text-center">{{ $product->getTranslation('name', 'ar') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.description_en') }}</td>
                                                <td class="text-center">{{ $product->getTranslation('description', 'en') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.description_ar') }}</td>
                                                <td class="text-center">{{ $product->getTranslation('description', 'ar') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.code') }}</td>
                                                <td class="text-center">{{ $product->code }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.sale_price') }}</td>
                                                <td class="text-center">{{ $product->sale_price_with_currency() }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.purchase_price') }}</td>
                                                <td class="text-center">{{ $product->purchase_price_with_currency() }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.profit') }}</td>
                                                <td class="text-center">
                                                    {{ $profit = $product->sale_price - $product->purchase_price }} EGP
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.quantity') }}</td>
                                                <td class="text-center">{{ $product->quantity }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.profit_with_quantities') }}</td>
                                                <td class="text-center">{{ $profit * $product->quantity }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.status') }}</td>
                                                <td @class([
                                                    'text-center',
                                                    'text-success' => $product->status,
                                                    'text-danger' => !$product->status,
                                                ])>
                                                    {{ __('seller.all_products.' . printEnum(App\Enums\CategoryEnum::class, $product->status)) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.category') }}</td>
                                                <td class="text-center"> {{ $product->category->name }} </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <h3>{{ __('seller.show_product.specs') }}</h3>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('seller.show_product.spec_name') }}</th>
                                            <th>{{ __('seller.show_product.spec_value') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->specs as $spec)
                                            <tr>
                                                <td>{{ $spec->name }}</td>
                                                <td>{{ $spec->pivot->value }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 mt-3">
                                <h3> {{ __('seller.show_product.reviews') }} </h3>
                                @if (count($product->reviews) == 0)
                                    <div class="bg-light">
                                        <p class="text-red  p-3 text-center">{{ __('seller.show_product.no_reviews') }}
                                        </p>
                                    </div>
                                @else
                                    <table id="reviews" class="table table-striped review">
                                        <tbody>
                                            @foreach ($product->reviews as $review)
                                                <tr>
                                                    <td class="col-4">
                                                        <div class="w-50 d-inline-block">
                                                            <i class="zmdi zmdi-account mr-1"></i>
                                                            {{ $review->user->name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @for ($i = 0; $i < $review->rate; $i++)
                                                            <i class="zmdi zmdi-star text-success"></i>
                                                        @endfor
                                                        @for ($i = 0; $i < 5 - $review->rate; $i++)
                                                            <i class="zmdi zmdi-star-outline"></i>
                                                        @endfor
                                                    </td>
                                                    <td class="col-4">
                                                        {{ $review->comment }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif

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

@push('scripts')
    @if (session()->has('success'))
        <script>
            Swal.fire(
                'Good Job',
                '{{ session()->get('success') }}',
                'success'
            );
        </script>
    @elseif (session()->has('error'))
        <script>
            Swal.fire(
                'Failed',
                '{{ session()->get('error') }}',
                'error'
            );
        </script>
    @endif
@endpush
