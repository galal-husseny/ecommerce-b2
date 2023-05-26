@extends('admin.layouts.parent')

@section('title', __('messages.frontend.shop.title'))

@section('header')
    @include('admin.layouts.partials.header')
@endsection

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
                                <h3 class="card-title"> {{__('admin.sidebar.specs.all')}} </h3>
                                <a href="{{route('admins.specs.create')}}" class="button-general col-3 ml-auto"> {{__('admin.sidebar.specs.create')}} </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin.all_users.name') }}</th>
                                            <th>{{ __('admin.all_users.email') }}</th>
                                            <th>{{ __('admin.all_users.phone') }}</th>
                                            <th>{{ __('admin.all_users.status') }}</th>
                                            <th>{{ __('admin.all_users.operations') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ucfirst($user->name) }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td @class([
                                                'p-2',
                                                'text-success' => $user->status,
                                                'text-danger' => ! $user->status,
                                                ])>{{__('admin.all_users.' . printEnum(App\Enums\CategoryEnum::class , $user->status))}}</td>
                                            <td>
                                                <a href="{{route('admins.users.show' ,  [\Illuminate\Support\Facades\Crypt::encryptString($user->id)])}}" class="btn btn-sm btn-primary my-2  rounded-pill w-50 "> {{__('admin.all_users.edit')}} </a>
                                                <form action="{{route('admins.users.destroy' , [\Illuminate\Support\Facades\Crypt::encryptString($user->id)])}}" method="post" class="d-inline w-50">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger  my-2 rounded-pill w-50" type="submit">
                                                        {{__('admin.all_users.delete')}}
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
            </section>
    </div>

@endsection

@section('footer')
    @include('admin.layouts.partials.footer')
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
@endpush
