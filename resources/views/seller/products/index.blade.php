@extends('seller.layouts.parent')

@section('title', 'Home')

@section('header')
    @include('seller.layouts.partials.header')
@endsection

@push('links')
    @vite('resources/css/app.css')
@endpush
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
                                <h3 class="card-title"> {{__('All products')}} </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-1">{{ __('id') }}</th>
                                            <th class="col-1">{{ __('name') }}</th>
                                            <th class="col-1">{{ __('code') }}</th>
                                            <th class="col-1">{{ __('sale_price') }}</th>
                                            <th class="col-1">{{ __('purchase_price') }}</th>
                                            <th class="col-1">{{ __('profit') }}</th>
                                            <th class="col-1">{{ __('quantity') }}</th>
                                            <th class="col-1">{{ __('profit_with_quantities') }}</th>
                                            <th class="col-1">{{ __('status') }}</th>
                                            <th class="col-1">{{ __('sellersd') }}</th>
                                            <th class="col-1">{{ __('category') }}</th>
                                            <th class="col-1">{{ __('operations') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $index => $product)
                                        <tr>
                                            <td class="col-1">{{++$index}}</td>
                                            <td class="col-1">{{$product->getTranslation('name','en') .' - ' . $product->getTranslation('name','ar')}}</td>
                                            <td class="col-1">{{$product->code}}</td>
                                            <td class="col-1">{{$product->sale_price_with_currency()}}</td>
                                            <td class="col-1">{{$product->purchase_price_with_currency()}}</td>
                                            <td class="col-1">{{$profit = $product->sale_price - $product->purchase_price}} EGP</td>
                                            <td class="col-1">{{$product->quantity}}</td>
                                            <td class="col-1">{{$profit * $product->quantity}}</td>
                                            <td class="col-1">{{$product->status}}</td>
                                            <td class="col-1"></td>
                                            <td class="col-1"></td>
                                            <td class="col-1">
                                                <a href="" class="btn btn-success mb-1 rounded-pill w-100">Show</a>
                                                <a href="" class="btn btn-primary mt-1 rounded-pill w-100">Edit</a>
                                                <a href="" class="btn btn-danger mt-1 rounded-pill w-100">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
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
    @vite('resources/js/app.js')
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
@endpush
