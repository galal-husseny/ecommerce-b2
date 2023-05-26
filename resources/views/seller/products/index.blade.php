@extends('seller.layouts.parent')

@section('title', __('seller.all_products.title'))

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
                                <h3 class="card-title"> {{__('seller.sidebar.all')}} </h3>
                                <a href="{{route('sellers.products.create')}}" class="button-general col-3 ml-auto" style="text-decoration:none"> {{__('seller.sidebar.create')}} </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('seller.all_products.id') }}</th>
                                            <th>{{ __('seller.all_products.name') }}</th>
                                            <th>{{ __('seller.all_products.code') }}</th>
                                            <th>{{ __('seller.all_products.sale_price') }}</th>
                                            <th>{{ __('seller.all_products.purchase_price') }}</th>
                                            <th>{{ __('seller.all_products.profit') }}</th>
                                            <th>{{ __('seller.all_products.quantity') }}</th>
                                            <th>{{ __('seller.all_products.profit_with_quantities') }}</th>
                                            <th>{{ __('seller.all_products.status') }}</th>
                                            <th>{{ __('seller.all_products.category') }}</th>
                                            <th>{{ __('seller.all_products.operations') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $index => $product)
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td>{{$product->getTranslation('name','en') .' - ' . $product->getTranslation('name','ar')}}</td>
                                            <td>{{$product->code}}</td>
                                            <td>{{$product->sale_price_with_currency()}}</td>
                                            <td>{{$product->purchase_price_with_currency()}}</td>
                                            <td>{{$profit = $product->sale_price - $product->purchase_price}} EGP</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$profit * $product->quantity}}</td>
                                            <td @class([
                                                'p-2',
                                                'text-success' => $product->status,
                                                'text-danger' => ! $product->status,
                                                ])>{{__('seller.all_products.' . printEnum(App\Enums\CategoryEnum::class , $product->status))}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>
                                                <a href="{{route('sellers.products.show' , ['slug' => $product->slug, \Illuminate\Support\Facades\Crypt::encryptString($product->id)])}}" class="btn btn-sm btn-success my-2 rounded-pill "> {{__('seller.all_products.show')}} </a>
                                                <a href="{{route('sellers.products.edit' ,  \Illuminate\Support\Facades\Crypt::encryptString($product->id))}}" class="btn btn-sm btn-primary my-2  rounded-pill "> {{__('seller.all_products.edit')}} </a>
                                                <form action="{{route('sellers.products.destroy' , ['slug' => $product->slug, \Illuminate\Support\Facades\Crypt::encryptString($product->id)])}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger  my-2 rounded-pill " type="submit">
                                                        {{__('seller.all_products.delete')}}
                                                    </button>
                                                </form>
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
    @include('components.redirect-messages')

@endpush
