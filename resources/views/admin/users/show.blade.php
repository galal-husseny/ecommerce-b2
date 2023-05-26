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
                                <h3 class="card-title"> {{__('admin.sidebar.users.all')}} </h3>
                                <a href="{{route('admins.users.create')}}" class="button-general col-3 ml-auto"> {{__('admin.sidebar.users.create')}} </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="column-1 col-1 text-center"> # </th>
                                            <th class="column-2 col-1 text-center"> {{ __('messages.frontend.address.city') }} </th>
                                            <th class="column-3 col-2 text-center"> {{ __('messages.frontend.address.region') }}</th>
                                            <th class="column-4 col-1 text-center"> {{ __('messages.frontend.address.street') }} </th>
                                            <th class="column-5 col-1 text-center"> {{ __('messages.frontend.address.building') }} </th>
                                            <th class="column-6 col-1 text-center"> {{ __('messages.frontend.address.floor') }} </th>
                                            <th class="column-7 col-1 text-center"> {{ __('messages.frontend.address.flat') }} </th>
                                            <th class="column-8 col-1 text-center"> {{ __('messages.frontend.address.notes') }} </th>
                                            <th class="column-9 col-1 text-center"> {{ __('messages.frontend.address.type') }} </th>
                                            <th class="column-10 col-2 text-center"> {{ __('messages.frontend.address.actions') }} </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->addresses as $index => $address)
                                            <tr class="table_row">
                                                <td class="column-1 text-center"> {{ ++$index }} </td>
                                                <td class="column-2 text-center">{{ $address->region->city->name }}</td>
                                                <td class="column-3 text-center"> {{ $address->region->name }} </td>
                                                <td class="column-4 text-center"> {{ $address->street }} </td>
                                                <td class="column-5 text-center"> {{ $address->building }} </td>
                                                <td class="column-6 text-center"> {{ $address->floor }} </td>
                                                <td class="column-7 text-center"> {{ $address->flat }} </td>
                                                <td class="column-8 text-center"> {{ $address->notes }} </td>
                                                <td class="column-9 text-center"> {{ $address->type }} </td>
                                                <td class="column-10 text-center">
                                                    <a href="{{ route('users.address.edit', \Illuminate\Support\Facades\Crypt::encryptString($address->id)) }}" class="button-main mb-2"> {{ __('messages.frontend.address.edit') }} </a>
                                                    <form action="{{ route('users.address.destroy', \Illuminate\Support\Facades\Crypt::encryptString($address->id)) }}" method="post" class="d-iniline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="button-delete"> {{ __('messages.frontend.address.delete') }} </button>
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
