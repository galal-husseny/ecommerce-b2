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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
@endpush

@section('content')
    @parent
    @include('seller.layouts.partials.sidebar')
    <div class="content-wrapper">
        <section class="content my-5">
            <div class="container-fluid">
                <div class="row card">
                    <div class="card-header col-12">
                        <h3 > {{ __('seller.show_product.title') }} </h3>
                    </div>
                    @include('seller.layouts.partials.errors')
                    <div class="card mb-3 col-12" >
                        <div class="row g-0 p-2 align-items-center">
                            <div class="col-md-4">
                                <img src="{{ $product->getFirstMediaUrl('product') }}"
                                    class="img-fluid rounded-start" alt="...">
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
                                                <td class="text-center">{{ $product->getTranslation('description', 'en') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.description_ar') }}</td>
                                                <td class="text-center">{{ $product->getTranslation('description', 'ar') }}</td>
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
                                                    'text-danger' => ! $product->status,
                                                    ])>{{ __('seller.all_products.' . printEnum(App\Enums\CategoryEnum::class , $product->status)) }}</td>
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
                                <h3>{{__('seller.show_product.specs')}}</h3>
                                <table id="example1" class="table table-bordered table-striped caption-top">
                                    <caption>  </caption>
                                    <thead>
                                        <tr>
                                            <th>{{ __('seller.show_product.spec_name') }}</th>
                                            <th>{{ __('seller.show_product.spec_value') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($specs as $index => $spec)
                                        <tr>
                                            <td>{{$index}}</td>
                                            <td>{{$spec}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div class="col-md-12 mt-3">
                                <h3> {{__('seller.show_product.reviews')}} </h3>
                                <table class="table table-striped review">
                                    <tbody>
                                        @foreach ($reviews as $index=>$review )
                                        <tr class="{{$review['user'][0]->name}}">
                                            <td class="col-4">
                                                <div class="w-50 d-inline-block">
                                                    <i class="zmdi zmdi-account mr-1"></i>
                                                    {{ $review['user'][0]->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="stars-outer">
                                                    <div class="stars-inner"></div>
                                                </div>
                                            </td>
                                            <td class="col-4">
                                                {{ $review['comment'] }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
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

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    @if(session()->has('success'))
        <script>
            Swal.fire(
                'Good Job',
                '{{session()->get('success')}}',
                'success'
            );
        </script>
    @elseif (session()->has('error'))
        <script>
            Swal.fire(
                'Failed',
                '{{session()->get('error')}}',
                'error'
            );
        </script>
    @endif

    @push('script')
    console.log(reviews);
    <script>
        var reviews = @json($reviews)
        var reviews = [1=>'user']
        console.log(reviews)
        $('tbody').on('click' , '.stars-outer' , function(){
            var reviews = @json($reviews)
            var reviews = [1=>'user']
            console.log(reviews)
            const starTotal = 5;
            const starPercentage = (rate / starTotal) * 100;
            const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;
            document.querySelector(`.${rate} .stars-inner`).style.width = starPercentageRounded; 
        })
    </script>
    @endpush

@endpush
