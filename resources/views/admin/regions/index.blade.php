@extends('admin.layouts.parent')

@section('title', __('admin.all_regions.title'))

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
                                <h3 class="card-title"> {{__('admin.sidebar.cities.all')}} </h3>
                                <a href="{{route('admins.regions.create')}}" class="button-general col-3 ml-auto"> {{__('admin.sidebar.cities.create')}} </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin.all_regions.id') }}</th>
                                            <th>{{ __('admin.all_regions.name') }}</th>
                                            <th>{{ __('admin.all_regions.city') }}</th>
                                            <th>{{ __('admin.all_regions.status') }}</th>
                                            <th>{{ __('admin.all_regions.operations') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($regions as $index => $region)
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td>{{$region->getTranslation('name','en') .' - ' . $region->getTranslation('name','ar')}}</td>
                                            <td> {{$region->city->name}} </td>
                                            <td @class([
                                                'p-2',
                                                'text-success' => $region->status,
                                                'text-danger' => ! $region->status,
                                                ])>{{__('admin.all_regions.' . printEnum(App\Enums\CategoryEnum::class , $region->status))}}</td>
                                            <td>
                                                <a href="{{route('admins.regions.edit' ,  [\Illuminate\Support\Facades\Crypt::encryptString($region->id)])}}" class="btn btn-sm btn-primary my-2  rounded-pill " style="width: 45%"> {{__('admin.all_regions.edit')}} </a>
                                                <form action="{{route('admins.regions.destroy' , [\Illuminate\Support\Facades\Crypt::encryptString($region->id)])}}" method="post" class="d-inline w-25">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger  my-2 rounded-pill" type="submit" style="width: 45%">
                                                        {{__('admin.all_regions.delete')}}
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
