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
                                <h3 class="card-title"> {{ __('admin.sidebar.users.all') }} </h3>
                                <a href="{{ route('admins.users.create') }}" class="button-general col-3 ml-auto"> {{ __('admin.sidebar.users.create') }} </a>
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
                                                    'text-danger' => !$user->status,
                                                ])>{{ __('admin.all_users.' . printEnum(App\Enums\CategoryEnum::class, $user->status)) }}</td>
                                                <td>
                                                    <a href="{{ route('admins.users.show', [\Illuminate\Support\Facades\Crypt::encryptString($user->id)]) }}" class="btn btn-sm btn-primary my-2  rounded-pill  "> {{ __('admin.all_users.show') }} </a>
                                                    <a href="{{ route('admins.users.edit', [\Illuminate\Support\Facades\Crypt::encryptString($user->id)]) }}" class="btn btn-sm btn-success my-2  rounded-pill  "> {{ __('admin.all_users.edit') }} </a>

                                                    <form action="{{ route('admins.users.destroy', [\Illuminate\Support\Facades\Crypt::encryptString($user->id)]) }}" method="post" class="d-inline ">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger  my-2 rounded-pill " type="submit">
                                                            {{ __('admin.all_users.delete') }}
                                                        </button>
                                                    </form>
                                                    @if ($user->wasRecentlyUpdated && $user->wasChanged('email') && session()->get('success')== __('general.messages.updated'))
                                                        <a href="{{ route('admins.users.verify', [\Illuminate\Support\Facades\Crypt::encryptString($user->id)]) }}" class="button-general my-2  rounded-pill"> {{ __('admin.all_users.verify') }} </a>
                                                    @endif


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
    @if (session()->has('success'))
        <script>
            Swal.fire(
                'Good Job',
                '{{ session()->get('success') }}',
                'success'
            );
        </script>
    @elseif (session()->has('error'))
        <script>
            Swal.fire(
                'Failed',
                '{{ session()->get('error') }}',
                'error'
            );
        </script>
    @endif
@endpush
