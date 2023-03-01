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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> {{__('seller.show_product.title')}} </h3>
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
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('seller.show_product.id') }}</th>
                                            <th>{{ __('seller.show_product.name_en') }}</th>
                                            <th>{{ __('seller.show_product.name_ar') }}</th>
                                            <th>{{ __('seller.show_product.code') }}</th>
                                            <th>{{ __('seller.show_product.sale_price') }}</th>
                                            <th>{{ __('seller.show_product.purchase_price') }}</th>
                                            <th>{{ __('seller.show_product.profit') }}</th>
                                            <th>{{ __('seller.show_product.quantity') }}</th>
                                            <th>{{ __('seller.show_product.profit_with_quantities') }}</th>
                                            <th>{{ __('seller.show_product.status') }}</th>
                                            <th>{{ __('seller.show_product.category') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">{{$product[0]->id}}</td>
                                            <td class="text-center">{{$product[0]->getTranslation('name','en')}}</td>
                                            <td class="text-center">{{$product[0]->getTranslation('name','ar')}}</td>
                                            <td class="text-center">{{$product[0]->code}}</td>
                                            <td class="text-center">{{$product[0]->sale_price_with_currency()}}</td>
                                            <td class="text-center">{{$product[0]->purchase_price_with_currency()}}</td>
                                            <td class="text-center">{{$profit = $product[0]->sale_price - $product[0]->purchase_price}} EGP</td>
                                            <td class="text-center">{{$product[0]->quantity}}</td>
                                            <td class="text-center">{{$profit * $product[0]->quantity}}</td>
                                            <td class="text-center">{{$product[0]->status}}</td>
                                            <td class="text-center"> {{$category[0]->name}} </td>
                                        </tr>
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
