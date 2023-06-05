@extends('user.layouts.parent')
@section('title', __('messages.frontend.cart.your_cart'))

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection
@push('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('custom-css/orderBlade.css') }}" />
@endpush



@section('content')
    @parent
    <div class="container mb-5" style="margin-top: 10rem">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 border p-3">
                    <div class="card">
                        <div>
                            <h3 class="card-title"> Orders </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="column-1 col-1 text-center"> # </th>
                                        <th class="column-2 col-1 text-center"> code </th>
                                        <th class="column-3 col-2 text-center"> status</th>
                                        <th class="column-4 col-1 text-center"> total price </th>
                                        <th class="column-5 col-1 text-center"> final price </th>
                                        <th class="column-6 col-1 text-center"> delivery date </th>
                                        <th class="column-10 col-2 text-center"> {{ __('messages.frontend.address.actions') }} </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->addresses as $address)
                                        @if (count($address->orders) != 0)
                                            @foreach ($address->orders as $index => $order)
                                                <tr class="table_row">
                                                    <td class="column-1 text-center"> {{ ++$index }} </td>
                                                    <td class="column-2 text-center">{{ $order->code }}</td>
                                                    <td @class([
                                                        'p-2',
                                                        'text-center',
                                                        'text-success' => $order->status == 2,
                                                        'text-primary' => $order->status == 1,
                                                        'text-danger' => !$order->status,
                                                    ])>{{ __('admin.all_orders.' . printEnum(App\Enums\OrderEnum::class, $order->status)) }}</td>
                                                    <td class="column-4 text-center"> {{ $order->total_price }} </td>
                                                    <td class="column-6 text-center"> {{ $order->final_price }} </td>
                                                    <td class="column-7 text-center"> {{ $order->delivery_date }} </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('users.orders.show', [\Illuminate\Support\Facades\Crypt::encryptString(Auth::guard('web')->id()), \Illuminate\Support\Facades\Crypt::encryptString($order->id)]) }}" class="button-main mb-3"> {{ __('messages.frontend.order.show') }} </a>
                                                        @if ($order->status == 0)
                                                            <form action="{{ route('users.orders.update', \Illuminate\Support\Facades\Crypt::encryptString($order->id)) }}" method="post" class="w-100 align-middle " style="display: inline-block">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="3">
                                                                <button class="button-delete"> {{ __('messages.frontend.order.cancel') }} </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <p class="text-center text-danger my-3"> This address ha no orders</p>
                                        @endif
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
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
