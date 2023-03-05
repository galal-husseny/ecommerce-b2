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

@section('content')
    @parent
    @include('seller.layouts.partials.sidebar')
    <div class="content-wrapper">
        <section class="content my-5">
            <div class="container-fluid">
                <div class="row card">
                    <div class="card-header col-12">
                        <h3 class="card-title"> {{ __('seller.show_product.title') }} </h3>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card mb-3 col-9" >
                        <div class="row g-0 p-2">
                            <div class="col-md-4">
                                <img src="{{ asset('frontend-assets/images/product-01.jpg') }}"
                                    class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title">{{$product[0]->name}}</h3>
                                    <p class="card-text"> {{$product[0]->description}} </p>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table  table-striped">
                                        <tbody>
                                            <tr>
                                                <td>{{ __('seller.show_product.id') }}</td>
                                                <td class="text-center">{{ $product[0]->id }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.name_en') }}</td>
                                                <td class="text-center">{{ $product[0]->getTranslation('name', 'en') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.name_ar') }}</td>
                                                <td class="text-center">{{ $product[0]->getTranslation('name', 'ar') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.code') }}</td>
                                                <td class="text-center">{{ $product[0]->code }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.sale_price') }}</td>
                                                <td class="text-center">{{ $product[0]->sale_price_with_currency() }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.purchase_price') }}</td>
                                                <td class="text-center">{{ $product[0]->purchase_price_with_currency() }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.profit') }}</td>
                                                <td class="text-center">
                                                    {{ $profit = $product[0]->sale_price - $product[0]->purchase_price }} EGP
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.quantity') }}</td>
                                                <td class="text-center">{{ $product[0]->quantity }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.profit_with_quantities') }}</td>
                                                <td class="text-center">{{ $profit * $product[0]->quantity }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.status') }}</td>
                                                <td class="text-center">{{ $product[0]->status }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('seller.show_product.category') }}</td>
                                                <td class="text-center"> {{ $category[0]->name }} </td>
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
