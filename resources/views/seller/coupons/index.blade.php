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
                                <a href="{{route('sellers.coupons.create')}}" class="button-general col-3 ml-auto" style="text-decoration:none"> {{__('seller.sidebar.create')}} </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('seller.all_coupons.id') }}</th>
                                            <th>{{ __('seller.all_coupons.max_usage_number_per_user') }}</th>
                                            <th>{{ __('seller.all_coupons.discount') }}</th>
                                            <th>{{ __('seller.all_coupons.max_discount_value') }}</th>
                                            <th>{{ __('seller.all_coupons.code') }}</th>
                                            <th>{{ __('seller.all_coupons.max_usage_number') }}</th>
                                            <th>{{ __('seller.all_coupons.min_order_value') }}</th>
                                            <th>{{ __('seller.all_coupons.status') }}</th>
                                            <th>{{ __('seller.all_coupons.start_at') }}</th>
                                            <th>{{ __('seller.all_coupons.end_at') }}</th>
                                            <th>{{ __('seller.all_coupons.operations') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $index => $coupon)
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td>{{$coupon->max_usage_number_per_user}}</td>
                                            <td>{{$coupon->discount}}</td>
                                            <td>{{$coupon->max_discount_value}}</td>
                                            <td>{{$coupon->code}}</td>
                                            <td>{{$coupon->max_usage_number}}</td>
                                            <td>{{$coupon->min_order_value}}</td>
                                            <td @class([
                                                'p-2',
                                                'text-success' => $coupon->status,
                                                'text-danger' => ! $coupon->status,
                                                ])>{{__('seller.all_coupons.' . printEnum(App\Enums\CategoryEnum::class , $coupon->status))}}</td>
                                            <td>{{$coupon->start_at}}</td>
                                            <td>{{$coupon->end_at}}</td>
                                            <td>
                                                <a href="{{route('sellers.coupons.show' , \Illuminate\Support\Facades\Crypt::encryptString($coupon->id))}}" class="btn btn-sm btn-success my-2 rounded-pill "> {{__('seller.all_coupons.show')}} </a>
                                                <a href="{{route('sellers.coupons.edit' ,  \Illuminate\Support\Facades\Crypt::encryptString($coupon->id))}}" class="btn btn-sm btn-primary my-2  rounded-pill "> {{__('seller.all_coupons.edit')}} </a>
                                                <form action="{{route('sellers.coupons.destroy' , \Illuminate\Support\Facades\Crypt::encryptString($coupon->id))}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger  my-2 rounded-pill " type="submit">
                                                        {{__('seller.all_coupons.delete')}}
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

@endpush
