@extends('admin.layouts.parent')

@section('title', __('admin.all_cities.title'))

@section('header')
    @include('admin.layouts.partials.header')
@endsection


@push('links')
    <link rel="stylesheet" href="{{ asset('dashboard-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dashboard-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
    @parent
    @include('admin.layouts.partials.sidebar')
    <div class="content-wrapper">
        <section class="content my-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> {{__('admin.sidebar.addresses.all')}} </h3>
                                <a href="{{route('admins.addresses.create')}}" class="button-general col-3 ml-auto"> {{__('admin.sidebar.addresses.create')}} </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="col-1">{{ __('admin.all_addresses.id') }}</th>
                                            <th class="col-1">{{ __('admin.all_addresses.city') }}</th>
                                            <th class="col-1">{{ __('admin.all_addresses.region') }}</th>
                                            <th class="col-1">{{ __('admin.all_addresses.user') }}</th>
                                            <th class="col-1">{{ __('admin.all_addresses.street') }}</th>
                                            <th class="col-1">{{ __('admin.all_addresses.building') }}</th>
                                            <th class="col-1">{{ __('admin.all_addresses.floor') }}</th>
                                            <th class="col-1">{{ __('admin.all_addresses.flat') }}</th>
                                            <th class="col-1">{{ __('admin.all_addresses.notes') }}</th>
                                            <th class="col-1">{{ __('admin.all_addresses.type') }}</th>
                                            <th class="col-1">{{ __('admin.all_addresses.operations') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($addresses as $index => $address)
                                        <tr>
                                            <td class="col-1">{{++$index}}</td>
                                            <td class="col-1">{{$address->region->city->name}}</td>
                                            <td class="col-1">{{$address->region->name}}</td>
                                            <td class="col-1">{{$address->user->name}}</td>
                                            <td class="col-1">{{$address->street}}</td>
                                            <td class="col-1">{{$address->building}}</td>
                                            <td class="col-1">{{$address->floor}}</td>
                                            <td class="col-1">{{$address->flat}}</td>
                                            <td class="col-1">{{$address->notes}}</td>
                                            <td class="col-1">{{$address->type}}</td>
                                            <td class="col-1">
                                                <a href="{{route('admins.addresses.edit' ,  ["slug"=> $address->slug ,\Illuminate\Support\Facades\Crypt::encryptString($address->id)])}}" class="btn btn-sm btn-primary my-2  rounded-pill  "> {{__('admin.all_cities.edit')}} </a>
                                                <form action="{{route('admins.addresses.destroy' , [\Illuminate\Support\Facades\Crypt::encryptString($address->id)])}}" method="post" class="d-inline ">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger  my-2 rounded-pill " type="submit">
                                                        {{__('admin.all_cities.delete')}}
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
    @include('admin.layouts.partials.footer')
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
